<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use App\User;

use DB;

require __DIR__  . '/../../../vendor/autoload.php';

class SendPayment extends Command {

	protected $name = 'send:payment';
	protected $description = 'Command description.';
    protected $MIN_CASH_OUT = 4000;
    protected $MAX_CASH_OUT = 15000;
    protected $AMOUNT_PER_POINT = .0025;

    protected $apiContext;

	public function __construct()
	{
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ARMqarJW5LPvFb2bluBXqD-T2uo3l1J9gdtEGiefhtPGOOIe64n3ju3LGsm30rb2n_xm6Ff2_t4aw1cg',     // ClientID
                'EJsItBoB6L5WYFoSzIPr4Ly01reLK_KWPgKm-t6c-2fVFQ4cMoiGqYKT7zPisxO7Ee7tdrZMLNJ4yF9n'      // ClientSecret
            )
        );

        $this->apiContext->setConfig(
            array(
                'log.LogEnabled' => true,
                'log.FileName' => 'PayPal.log',
                'log.LogLevel' => 'FINE'
            )
        );

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

        //find all users that has status "requested payout"

        $paymentRequestedUsers = User::where('status', '=', 'payment_requested')->select('id')->get();

        $userIds = array();
        foreach($paymentRequestedUsers as $users) {
            array_push($userIds, $users['id']);
        }

        $payments = DB::select(DB::raw('SELECT user_id, email, sum(views_since_payment) as total_views_since_payment, SUM(points) as total_points
                FROM
                (
                    SELECT email, posts.id, user_id, posts.content_type, views_since_payment, views_since_payment*per_view as points
                    FROM posts
                    INNER JOIN (payouts, users)
                    ON (posts.content_type = payouts.content_type AND users.id = user_id)
                    WHERE posts.status = \'posted\'
                ) AS T
                WHERE user_id IN ('. join(',',$userIds).')
                GROUP BY user_id

        '));

        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        $senderBatchHeader->setSenderBatchId(uniqid())->setEmailSubject("You have a payment");

        $payouts = new \PayPal\Api\Payout();
        $payouts->setSenderBatchHeader($senderBatchHeader);

        $this->info("PAYMENTS TO BE MADE");
        foreach($payments as $payment)
        {
            $payoutAmount = round($payment->total_points * $this->AMOUNT_PER_POINT, 2, PHP_ROUND_HALF_DOWN);
            if($payment->total_points > $this->MAX_CASH_OUT) {
                $this->warning(' * User id ' . $payment->user_id .
                    ' has more points than maximum. Total views:  ' . $payment->total_views_since_payment.
                    'Total points: ' . $payment->total_points.
                    ' for a payout of ' . $payoutAmount);
            }
            else {
                $this->info(' - User id ' . $payment->user_id .
                    ' had ' . $payment->total_views_since_payment .
                    ' views since last payment and has ' . $payment->total_points .
                    ' points'.
                    ' for a payout of ' . $payoutAmount);
            }


            $senderItem = new \PayPal\Api\PayoutItem();
            $senderItem->setRecipientType('Email')
                ->setNote('Thanks you.')
                ->setReceiver($payment->email)
                ->setSenderItemId($payment->user_id . uniqid())
                ->setAmount(new \PayPal\Api\Currency('{
                        "value":"'. $payoutAmount .'",
                        "currency":"USD"
                    }')
                );

            $payouts->addItem($senderItem);
        }

        $proceed = $this->ask('Continue? (Y/N)');

        if ($proceed != 'Y') {
            return;
        }

        $request = clone $payouts;

        try {
            $output = $payouts->create(null, $this->apiContext);
        } catch (Exception $ex) {

            $this->error("Created Batch Payout"."Payout" . $request . $ex);
            exit(1);
        }

        $this->info("Created Batch Payout" . $output->getBatchHeader()->getPayoutBatchId() . $request . $output);
        return $output;
    }
}

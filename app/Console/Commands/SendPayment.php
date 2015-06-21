<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use App\User;

require __DIR__  . '/../../../vendor/autoload.php';

class SendPayment extends Command {

	protected $name = 'send:payment';
	protected $description = 'Command description.';

	public function __construct()
	{
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

        $paymentRequestedUsers = User::where('status', '=', 'payment_requested')->get();

        //for each user, calculate points they should get

        foreach ($paymentRequestedUsers as $paymentUser) {
            Post::where('user_id', '=', $paymentUser->id)->sum('views_since_payment');
        }


        //if the amount is above min cash out, add to senderItems



        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'ARMqarJW5LPvFb2bluBXqD-T2uo3l1J9gdtEGiefhtPGOOIe64n3ju3LGsm30rb2n_xm6Ff2_t4aw1cg',     // ClientID
                'EJsItBoB6L5WYFoSzIPr4Ly01reLK_KWPgKm-t6c-2fVFQ4cMoiGqYKT7zPisxO7Ee7tdrZMLNJ4yF9n'      // ClientSecret
            )
        );

        $apiContext->setConfig(
            array(
                'log.LogEnabled' => true,
                'log.FileName' => 'PayPal.log',
                'log.LogLevel' => 'FINE'
            )
        );

        $payouts = new \PayPal\Api\Payout();
        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();

        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a payment");

        $senderItem1 = new \PayPal\Api\PayoutItem();
        $senderItem1->setRecipientType('Email')
            ->setNote('Thanks you.')
            ->setReceiver('nupicture993-personal@gmail.com')
            ->setSenderItemId("item_1" . uniqid())
            ->setAmount(new \PayPal\Api\Currency('{
                        "value":"0.99",
                        "currency":"USD"
                    }'));


        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem1);

        $request = clone $payouts;

        try {
            $output = $payouts->create(null, $apiContext);
        } catch (Exception $ex) {

            $this->error("Created Batch Payout"."Payout" . $request . $ex);
            exit(1);

        }

        $this->info("Created Batch Payout" . $output->getBatchHeader()->getPayoutBatchId() . $request . $output);

        return $output;




    }





}

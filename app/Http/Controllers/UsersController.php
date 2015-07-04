<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UsersController extends Controller {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile($user)
	{
		$usersPosts = Post::where('user_id', '=', $user->id)->get();
		$statusToEnglish = ['pending_post' => 'Pending', 'rejected' => 'Rejected', 'posted' => 'Posted'];

		return view('user.profile', compact('user', 'usersPosts', 'statusToEnglish'));
	}

    /**
     * Post to request a payment
     */
    public function requestPayment($user)
    {
        //TODO: check if the user is logged into the account they are modified

        if($user->status == User::$statusGood)
        {
            $userPoints = User::usersPayments(array($user->id))[0];


            if($userPoints->total_points >= Post::$minCashOutPoints)
            {
                $user->status = User::$statusPaymentRequested;
                $user->save();
                return Redirect::back()->with('message', 'Payment requested.');
            }
            else
            {
                return Redirect::back()->withErrors('You don\'t have the minimum amount of points to cash out.');
            }


        }
        else if ($user->status == User::$statusPaymentRequested) {
            return Redirect::back()->with('message', 'You have already requested payment.');
        }


        return Redirect::back()->withErrors('You don\'t have permission to perform this action.');

    }

}

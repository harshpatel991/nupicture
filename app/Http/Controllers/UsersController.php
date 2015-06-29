<?php namespace App\Http\Controllers;

use App\Post;
use App\User;

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
        $payment = User::usersPayments(array($user->id))[0];
        $points = $payment->total_points;

//        dd($usersPosts);
        $pointsPerView = Post::$perViewPoints;
		return view('user.profile', compact('user', 'usersPosts', 'statusToEnglish', 'points', 'pointsPerView'));
	}

    /**
     * Post to request a payment
     */
    public function requestPayment($user)
    {
        //TODO: check if the user is logged into the account they are modified

        if($user->status == 'good')
        {
            //check if the user has the min amount to cash out

            $results = User::usersPayments(array($user->id));

            dd($results);

        }


    }



}

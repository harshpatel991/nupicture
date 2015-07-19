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
        //TODO: only allow logged in user to view profile
		$usersPosts = Post::where('user_id', '=', $user->id)->get();
		$statusToEnglish = ['pending_post' => 'Pending', 'rejected' => 'Rejected', 'posted' => 'Posted'];

		return view('user.profile', compact('user', 'usersPosts', 'statusToEnglish'));
	}

}

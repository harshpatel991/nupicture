<?php namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\User;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile()
	{
        $user = Auth::user();
		$usersPosts = Post::where('user_id', '=', $user->id)->get();
		$statusToEnglish = ['pending_post' => 'Pending', 'rejected' => 'Rejected', 'posted' => 'Posted'];

		return view('user.profile', compact('user', 'usersPosts', 'statusToEnglish'));
	}

    public function preferences() {
        $user = Auth::user();
        $email_preferences = explode(',', $user->email_preferences);

        foreach($email_preferences as $index => $email_preference) {
            if($email_preference == 'true') {
                $email_preferences[$index] = 'checked';
            } else {
                $email_preferences[$index] = '';
            }
        }

        return view('user.preferences', compact('user', 'usersPosts', 'statusToEnglish', 'email_preferences'));
    }

    public function savePreferences(Request $request) {
        $emailPreferences = $request->get('email-post-reminders') . ',' .
            $request->get('email-post-submitted') . ',' .
            $request->get('email-post-published') . ',' .
            $request->get('email-news');

        $user = Auth::user();
        $user->email_preferences = $emailPreferences;
        $user->save();

        return redirect()->back()->with('message', 'Saved!');
    }

}

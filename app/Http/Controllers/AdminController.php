<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notification;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Input;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

	public function getDashboard()
	{
        $recentTime = Carbon::now()->subDays(2);

        $allUsers = User::get();
        $recentUsers = User::where('created_at', '>', $recentTime->toDateString())->orderby('created_at', 'desc')->get();
        $recentUsersCount = count($recentUsers);

        $allPosts = Post::get();
        $recentPendingPosts = Post::where('created_at', '>', $recentTime->toDateString())->where('status', 'pending_post')->orderby('created_at', 'desc')->get();
        $recentPendingPostsCount = count($recentPendingPosts);

        $newsletterSubscribersCount = count(Notification::all());

        return view('admin.dashboard', compact('allUsers', 'recentUsers', 'allPosts', 'recentPendingPosts', 'recentUsersCount', 'recentPendingPostsCount', 'newsletterSubscribersCount'));
	}

    /**
     * Approve a post
     */
    public function approve($post, Request $request)
    {
        $post->status = 'posted';
        $post->posted_at = Carbon::now();
        $post->save();

        $additionalMessage = $request->input('message');
        $postLink = '/post/'.$post->slug;

        $emailPreferences = explode(",", User::find($post->user_id)->email_preferences);

        if($emailPreferences[2] == "true") {
            Mail::queue(['emails.approved', 'emails.approved-plain-text'], ['postLink' => $postLink, 'additionalMessage' => $additionalMessage, 'logoPath' => 'http://www.topicloop.com/images/logo.png'], function ($message) {
                $poster = User::whereId(Input::get('user_id'))->first()->email;
                $message->to($poster)
                    ->bcc('support@topicloop.com', 'Support')
                    ->subject('Your Post Has Been Approved');
            });
        }

        return redirect('/post/'.$post->slug);
    }

}

<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;

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

        return view('admin.dashboard', compact('allUsers', 'recentUsers', 'allPosts', 'recentPendingPosts', 'recentUsersCount', 'recentPendingPostsCount'));
	}

}

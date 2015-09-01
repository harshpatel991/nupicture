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
        $recentUsers = User::where('created_at', '>', $recentTime->toDateString())->get();

        $allPosts = Post::get();
        $recentPosts = Post::where('created_at', '>', $recentTime->toDateString())->get();
        return view('admin.dashboard', compact('allUsers', 'recentUsers', 'allPosts', 'recentPosts'));
	}

}

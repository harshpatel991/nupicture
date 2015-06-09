<?php namespace App\Http\Controllers;

use Input;
use Redirect;

use App\Post;
use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller {



	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::where('status', 'posted')->get();
		return view('home', compact('posts'));
	}

	public function category($category) {
		$posts = Post::where('category', $category)->get();
		return view('home', compact('posts'));
	}


	public function getBetaSignUp()
	{
		$cashPerPoint = Post::$cashPerPoint;
		$postNames = Post::$postNames;
		$basePoints = Post::$basePoints;
		$perViewPoints = Post::$perViewPoints;
		return view('betaSignUp', compact('basePoints', 'perViewPoints', 'postNames', 'cashPerPoint'));
	}


	public function postBetaSignUp(Request $request) {
		$this->validate($request, [
			'email' => 'required|unique:notifications|max:254|email'
		]);

		Notification::create($request->all());
		return Redirect::route('sign-up-beta')->with('message', 'You\'re all set! We\'ll send you an email when you can register.');
	}

	public function increasePageViews() {
		return view('increasePageViews');
	}



}

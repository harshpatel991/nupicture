<?php namespace App\Http\Controllers;

use App\Post;

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
		$posts = Post::all();
		$posts = $posts->toArray();

		for($i = 0; $i < count($posts); $i++) {
			$posts[$i] = array_add($posts[$i], 'thumbnail-class', self::determineThumnailBucket('upload/'.$posts[$i]['content']));
		}
//		dd($posts);
		return view('home', compact('posts'));
	}

	private static function determineThumnailBucket($file) {
		list($width, $height, $type, $attr) = getimagesize($file);

		$ratio = $height/$width;

		if ($ratio <= 1.2) //it's a square shape
		{
			return 'sm';
		}
		else if($ratio < 1.4)
		{
			return 'md';
		}
		else
		{
			return 'lg';
		}
	}



}

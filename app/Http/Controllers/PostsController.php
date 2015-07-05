<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostsController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display a post
	 *
	 */
	public function show($post, Request $request)
	{
        if(!$request->session()->has('visited'.$post->slug))
        {
            $request->session()->put('visited'.$post->slug, true);

            $post->views = $post->views+1;
            $post->save();
        }

        $postedDate = date_format(new \DateTime($post->posted_at), "F j, Y");

		$postedBy = User::find($post->user_id);

		$relatedPosts = Post::orderByRaw("RAND()")->get();
		$popularPosts = Post::orderBy('views', 'desc')->limit(5)->get();

        $appAdWeight = Config::get('app.ad_weight');
        $appPublisherId = Config::get('app.app_publisher_id');
        $userAdWeight = 100-$appAdWeight;
        $userPublisherId = $postedBy->publisher_id;
        $weightedAdIds = [$appPublisherId => $appAdWeight,$userPublisherId => $userAdWeight];

        //choose a random publisher id
        $publisherId = $this::getRandomWeightedElement($weightedAdIds);

		return view('post.post', compact('post', 'postedDate', 'postedBy', 'relatedPosts', 'popularPosts', 'publisherId'));
	}


    private static function getRandomWeightedElement(array $weightedValues) {
        $rand = mt_rand(1, (int) array_sum($weightedValues));

        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }
}

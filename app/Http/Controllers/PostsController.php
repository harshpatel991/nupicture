<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($post, Request $request)
	{

        if(!$request->session()->has('visited'.$post->slug))
        {
            $request->session()->put('visited'.$post->slug, true);

            $post->total_views = $post->total_views+1;
            $post->views_since_payment = $post->views_since_payment+1;
            $post->save();
        }

		$postedBy = User::find($post->user_id);

		$relatedPosts = Post::orderByRaw("RAND()")->get();
		$popularPosts = Post::orderBy('total_views', 'desc')->limit(5)->get();

		return view('post.post', compact('post', 'postedBy', 'relatedPosts', 'popularPosts'));
	}
}

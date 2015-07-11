<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Section;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use Config;
use \Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
	public function store(Request $request)
	{

        \Log::info('Request to store a post: ' . print_R($request->all(), TRUE));
        $currentPosition = 0;

        $post = new Post;
        $post->user_id = 1; //TODO
        $post->status = Post::$pendingPostStatus;
        $post->title = $request->input(Section::$TITLE_SECTION_NAME);
        $post->slug = Str::slug($request->input(Section::$TITLE_SECTION_NAME)).rand(0, 9999);
        $post->views = 0;
        $post->save();

        foreach($request->all() as $sectionId => $section)
        {
            $currentPosition ++;

            if(strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE && count($section) == 2 && (strlen($section[0]) > 0 || strlen($section[1]) > 0 ))
            {
                $newSection = new Section();
                $newSection ->make($currentPosition, $post->id, Section::$TEXT_SECTION_NAME, $section[0], $section[1]);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE && count($section) == 1 && strlen($section[0]) > 0)
            {
                $image = $request->file($sectionId)[0];
                $extension = $image->guessExtension();
                $imageUploadedName = $post->slug . '-' . $currentPosition . rand(0, 99) . '.' . $extension;
                $imageUploadStatus = Section::uploadImage($image, $imageUploadedName, $extension);

                if($imageUploadStatus !== TRUE) {
                    Log::warning("Image was not uploaded due to " . $imageUploadStatus);
                }

                $newSection = new Section();
                $newSection ->make($currentPosition, $post->id, Section::$IMAGE_SECTION_NAME, '', $imageUploadedName);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $newSection = new Section();
                $newSection->make($currentPosition, $post->id, Section::$LIST_NUMBER_SECTION_NAME, '', '');
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE && strlen($section) > 0)
            {
                $newSection = new Section();
                $newSection->make($currentPosition, $post->id, Section::$SOURCE_SECTION_NAME, '', $section);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$TOKEN_SECTION_NAME) !== FALSE || strpos($sectionId, Section::$TITLE_SECTION_NAME) !== FALSE )
            {
                //ignore the token and title section
            }
            else
            {
                Log::warning('Section '. $sectionId . ' did not fall into any valid sections, ignoring.');
            }
        }
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

<?php namespace App\Http\Controllers;

use App;
use Auth;
use App\Post;
use App\User;
use App\Section;
use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;
use Image;
use Config;
use \Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['show', 'approve']]);
        $this->middleware('verfiedEmail', ['except' => ['show', 'approve', 'preview']]);
    }

	/**
	 * Show the form for creating a new post.
	 */
	public function create(Request $request)
	{
        $oldValues = $request->old();
        $oldSectionsByJS = array();

        foreach($oldValues as $sectionId => $section)
        {
            $newSection = new Section();

            if(strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE)
            {
                $newSection->optional_content = $section[0];
                $newSection->content = str_replace( "\r\n", '\r\n', $section[1] );
                $newSection->createByJS = 'addTextSection';
                array_push($oldSectionsByJS, $newSection);
            }
            elseif(strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE)
            {
                $newSection->createByJS = 'addImageSection';
                $newSection->optional_content = $section[1];
                array_push($oldSectionsByJS, $newSection);
            }

            elseif(strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $newSection->optional_content = $section;
                $newSection->createByJS = 'addListNumberSection';
                array_push($oldSectionsByJS, $newSection);
            }

            elseif(strpos($sectionId, Section::$YOUTUBE_SECTION_NAME) !== FALSE)
            {
                $newSection->content = $section;
                $newSection->createByJS = 'addYoutubeSection';
                array_push($oldSectionsByJS, $newSection);
            }

            elseif(strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE)
            {
                $newSection->content = $section;
                $newSection->createByJS = 'addSourceSection';
                array_push($oldSectionsByJS, $newSection);
            }
        }

        $categories = Post::$categories;
		return view('post.create', compact('categories', 'oldSectionsByJS'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StorePostRequest $request)
	{
        Log::info('Request to store a post: ' . print_R($request->all(), TRUE));

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->status = Post::$pendingPostStatus;
        $post->title = $request->input(Section::$TITLE_SECTION_NAME);
        $post->slug = substr(Str::slug($request->input(Section::$TITLE_SECTION_NAME)), 0, 33).'-'.rand(0, 9);
        $post->summary = $request->input(Section::$SUMMARY_SECTION_NAME);

        $thumbnailUploadName =  $post->slug .'-thumb.jpg';
        Image::make($request->file(Section::$THUMBNAIL_SECTION_NAME))
            ->encode('jpg')
            ->fit(600, 450, function ($constraint) { $constraint->upsize();})
            ->save(Post::getBackupImageUploadPath().$thumbnailUploadName, 70);

        $s3 = App::make('aws')->get('s3');
        $s3->putObject(array(
            'ACL'        => 'public-read',
            'Bucket'     => 'topicloop-upload2',
            'Key'        => Post::getImageUploadPath().$thumbnailUploadName,
            'SourceFile' => Post::getBackupImageUploadPath().$thumbnailUploadName,
        ));

        $post->thumbnail_image = $thumbnailUploadName;
        $post->views = 0;
        $post->category = $request->input(Section::$CATEGORY_SECTION_NAME);
        $post->save();

        $sectionIdIndex = 0;
        foreach($request->all() as $sectionId => $section)
        {
            if(strpos($sectionId, Section::$TEXT_SECTION_NAME) !== FALSE)
            {
                $newSection = new Section();
                $newSection ->make($post->id, Section::$TEXT_SECTION_NAME, $section[0], $section[1]);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$IMAGE_SECTION_NAME) !== FALSE)
            {
                $imageUploadedName = $post->slug . $sectionIdIndex . '.jpg';
                Image::make($request->file($sectionId)[0])
                    ->encode('jpg')
                    ->widen(1100, function ($constraint) { $constraint->upsize();})
                    ->save(Post::getBackupImageUploadPath().$imageUploadedName, 75);
                $s3->putObject(array(
                    'ACL'        => 'public-read',
                    'Bucket'     => 'topicloop-upload2',
                    'Key'        => Post::getImageUploadPath().$imageUploadedName,
                    'SourceFile' => Post::getBackupImageUploadPath().$imageUploadedName,
                ));

                $newSection = new Section();
                $newSection ->make($post->id, Section::$IMAGE_SECTION_NAME, $section[1], $imageUploadedName);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$LIST_NUMBER_SECTION_NAME) !== FALSE)
            {
                $newSection = new Section();
                $newSection->make($post->id, Section::$LIST_NUMBER_SECTION_NAME, $section, '');
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$YOUTUBE_SECTION_NAME) !== FALSE)
            {
                $newSection = new Section();

                //store the youtube video id
                if(preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $section, $matches))
                {
                    $newSection->make($post->id, Section::$YOUTUBE_SECTION_NAME, '', $matches[1]);
                    $newSection->save();
                }

            }
            elseif(strpos($sectionId, Section::$SOURCE_SECTION_NAME) !== FALSE)
            {
                $newSection = new Section();
                $newSection->make($post->id, Section::$SOURCE_SECTION_NAME, '', $section);
                $newSection->save();
            }
            elseif(strpos($sectionId, Section::$TOKEN_SECTION_NAME) !== FALSE || strpos($sectionId, Section::$TITLE_SECTION_NAME) !== FALSE || strpos($sectionId, Section::$CATEGORY_SECTION_NAME) !== FALSE || strpos($sectionId, Section::$SUMMARY_SECTION_NAME) !== FALSE || strpos($sectionId, Section::$THUMBNAIL_SECTION_NAME) !== FALSE)
            {
                //ignore these sections
            }
            else
            {
                Log::warning('Section '. $sectionId . ' did not fall into any valid sections, ignoring.');
            }

            $sectionIdIndex = $sectionIdIndex + 1;
        }

        return redirect('/profile')->with('message', 'Your post has been submitted! It will be reviewed in the next 12 hours. You can check it\'s status below.');
	}

	/**
	 * Display a post
	 */
	public function show($post, Request $request)
    {

        if ($post->status !== 'posted') {
            return redirect('/');
        }

        return $this->preview($post, $request);
    }

    public function preview($post, Request $request)
    {

        if(!$request->session()->has('visited'.$post->slug)) //Count a view
        {
            $request->session()->put('visited'.$post->slug, true);

            $post->views = $post->views+1;
            $post->save();
        }

        $sections = Section::where('post_id', '=', $post->id)->orderBy('id')->get();
        $sources = Section::where('post_id', '=', $post->id)->where('type', '=', Section::$SOURCE_SECTION_NAME)->orderBy('id')->get();

        $listNumberCounter = 1;

        $postedDate = date_format(new \DateTime($post->posted_at), "F j, Y");
		$postedBy = User::find($post->user_id);

		$relatedPosts = Post::where('status', 'posted')->orderByRaw("RAND()")->limit(3)->get();
		$popularPosts = Post::where('status', 'posted')->orderBy('views', 'desc')->limit(5)->get();

        $appAdWeight = Config::get('app.ad_weight');
        $appPublisherId = Config::get('app.app_publisher_id');
        $userAdWeight = 100-$appAdWeight;
        $userPublisherId = ($postedBy->publisher_id === '') ? $appPublisherId : $postedBy->publisher_id;
        $weightedAdIds = [$appPublisherId => $appAdWeight,$userPublisherId => $userAdWeight];

        //choose a random publisher id
        $publisherId = $this::getRandomWeightedElement($weightedAdIds);

		return view('post.post', compact('post', 'sections', 'sources', 'postedDate', 'postedBy', 'relatedPosts', 'popularPosts', 'publisherId', 'listNumberCounter'));
	}

    /**
     * Approve a post
     */
    public function approve($post, Request $request)
    {
        $post->status = 'posted';
        $post->posted_at = Carbon::now();
        $post->save();

        return redirect('/post/'.$post->slug);
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

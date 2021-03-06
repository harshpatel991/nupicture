<?php namespace App\Http\Controllers;

use \Log;
use Mail;
use Input;
use Redirect;
use Session;
use App\Post;
use App\Notification;
use Illuminate\Http\Request;

use Carbon\Carbon;


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

        $recentTime = Carbon::now()->subDays(100);
        $popularPosts = Post::where('status', 'posted')->where('created_at', '>', $recentTime->toDateString())->orderBy('views', 'desc')->limit(4)->get();

        //TODO: can remove
//        $popularPosts = Post::where('status', 'posted')->orderBy('views', 'desc')->limit(4)->get();
//        $popularPostIDs = array();
//        foreach($popularPosts as $popularPost) {
//            array_push($popularPostIDs, $popularPost->id);
//        }

		$posts = Post::where('status', 'posted')->limit(10)->orderBy('created_at', 'desc')->get();
        $heroPost = Post::where('slug', '10-fantastic-battlestations-3')->first();
        return view('home', compact('posts', 'popularPosts', 'heroPost'));
	}

	public function category($category) {
		$posts = Post::where('category', $category)->get();

		return view('category', compact('posts', 'category'));
	}

    public function getHowItWorks() {
        return view('howItWorks');
    }

	public function getBetaSignUp()
	{
		return view('betaSignUp');
	}

    public function getContactUs() {
        return view('contactUs');
    }

    public function postContactUs(Request $request) {
        $this->validate($request, [
            'email' => 'required|max:254|email',
            'message' => 'required|max:2500'
        ]);

        Mail::queue('emails.contactus', ['email' => Input::get('email'), 'content' => Input::get('message')], function($message) {
            $message->to('support@topicloop.com')
                ->subject('Contact Us');
        });
        Log::info('Contact Us: '. Input::get('email') . ' : ' . Input::get('message'));
        return Redirect::route('/contact-us')->with('message', 'You\'re all set! We\'ll get back to you as soon as we can.');
    }

	public function increasePageViews() {
		return view('increasePageViews');
	}

    public function privacyPolicy() {
        return view('privacyPolicy');
    }

    public function termsAndConditions() {
        return view('termsAndConditions');
    }

    public function contentGuidelines() {
        return view('contentGuidelines');
    }

    public function resendConfirmationEmail() {
        Mail::queue('emails.verify', ['confirmationCode' => Input::get('confirmationCode'), 'logoPath' => 'http://www.topicloop.com/images/logo.png'], function($message) {
            $message->to(Input::get('email'))
                ->bcc('support@topicloop.com', 'Support')
                ->subject('Please confirm your email');
        });
        dd(Input::get('confirmationCode') . ' ' . Input::get('email'));
    }

    public function postEmailNotifications(Request $request) {
        $this->validate($request, [
            'email' => 'required|unique:notifications|max:254|email'
        ]);

        Notification::create(['email' => $request->get('email')]);
        return redirect()->back()->with('message', 'You\'re all set! Expect an email about every week.');

    }
}

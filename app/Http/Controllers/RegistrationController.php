<?php namespace App\Http\Controllers;

use App\Post;
use Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RegistrationController extends Controller {

    public function signupSuccess() {

        $recentPosts = Post::orderBy('created_at')->limit(5)->get();

        $email = 'your email';
        if(\Auth::check()) {
            $email = \Auth::user()->email;
        }

        return view('signUpSuccess', compact('email', 'recentPosts', 'randomPost'));
    }


    public function verifySuccess($confirmation_code)
	{
        $randomPost = Post::orderByRaw("RAND()")->limit(1)->get()[0];

        if(!$confirmation_code)
        {
            return Redirect::route('home');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user)
        {
            return Redirect::route('home')->withErrors(['confirmation' =>'Confirmation code not found']);
        }

        if($user->status = 'unconfirmed')
        {
            $user->status = 'good';
        }
        $user->save();

        return view('verificationSuccess', compact('randomPost'));
	}

}

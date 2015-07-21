<?php namespace App\Http\Controllers;

use Redirect;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RegistrationController extends Controller {


	public function verify($confirmation_code)
	{
        if(!$confirmation_code)
        {
            return Redirect::route('home');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user)
        {
            return Redirect::route('home')->withErrors(['confirmation' =>'Confirmation code not found']);
        }

        $user->status = 'good';
        //$user->confirmation_code = null;
        $user->save();

        return Redirect::route('home')->with('message', 'You have successfully verified your account.');
	}

}

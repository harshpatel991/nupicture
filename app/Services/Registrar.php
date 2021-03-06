<?php namespace App\Services;

use \Log;
use Input;
use Mail;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|alpha_dash|max:60|unique:users,username',
			'email' => 'required|email|max:255|unique:users,email',
			'password' => 'required|confirmed|min:6',
            'publisher_id' => 'alpha_dash|size:20',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $confirmationCode = str_random(16);
		$newUser = User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
            'publisher_id' => $data['publisher_id'],
            'status' => 'unconfirmed',
            'confirmation_code' => $confirmationCode
		]);

        Mail::queue(['emails.verify', 'emails.verify-plain-text'], ['confirmationCode' => $confirmationCode, 'logoPath' => 'http://www.topicloop.com/images/logo.png'], function($message) {
            $message->to(Input::get('email'))
                ->bcc('support@topicloop.com', 'Support')
                ->subject('Please confirm your email');
        });
        Log::info('Confirm email sent out to '.Input::get('email'));
        return $newUser;
	}

}

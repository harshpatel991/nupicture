<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/post/create', 'PostsController@create');
Route::get('/post/{post_slug}', 'PostsController@show');
Route::bind('post_slug', function($value, $route) {
	return App\Post::whereSlug($value)->first();
});

Route::get('/user/{user_name}', 'UsersController@profile');
Route::bind('user_name', function($value, $route) {
	return App\User::where('username', '=', $value)->firstOrFail();
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

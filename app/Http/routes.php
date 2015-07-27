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

Route::get('/sign-up-beta',
	['as' => 'sign-up-beta', 'uses' => 'HomeController@getBetaSignUp']);

Route::post('/sign-up-beta',
	['as' => 'sign-up-beta-post', 'uses' => 'HomeController@postBetaSignUp']);

Route::get('/how-it-works',
    ['as' => 'how-it-works', 'uses' => 'HomeController@getHowItWorks']);


Route::get('/exposure-guide',
	['as' => 'increase-page-views', 'uses' => 'HomeController@increasePageViews']);

//Route::get('/{category}', 'HomeController@category');
Route::get('/',
    ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/post/create', 'PostsController@create');
Route::post('/post/create',
    ['as' => '/post/create', 'uses' => 'PostsController@store']);

Route::get('/post/{post_slug}',
    ['as' => 'post', 'uses' => 'PostsController@show']);
Route::bind('post_slug', function($value, $route) {
	$post = App\Post::whereSlug($value)->first();
    if($post) return $post;
    App::abort(404);
});

Route::get('/post/approve/{post_id}', 'PostsController@approve');
Route::bind('post_id', function($value, $route) {
    $post = App\Post::whereId($value)->first();
    if($post) return $post;
    App::abort(404);
});

Route::get('/profile', 'UsersController@profile');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/sign-up-success', 'RegistrationController@signupSuccess');
Route::get('/verify/{confirmation_code}', 'RegistrationController@verifySuccess');


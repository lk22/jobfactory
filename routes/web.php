<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
});

/**
 * pages
 */

	Route::name('about')->get('/about')->uses('PageController@about');
	Route::name('sitemap')->get('/sitemap')->uses('PageController@sitemap');

	/**
	 * blog
	 */

		Route::prefix('/')->group(function() {
			Route::name('posts')->get('/blog')->uses('PostController@posts');
			Route::name('post')->get('/blog/post/{slug}')->uses('PostController@post');
		});

/**
 * contact routes
 */
	Route::name('contact')->get('/contact')->uses('PageController@contact');
	Route::name('contact-me')->post('/contact')->uses('PageController@sendContact');

/**
 * provider callbacks
 */
	Route::name('provider.google')->get('/login/google')->uses('Auth\LoginController@redirectToGoogle');
	Route::name('provider.google.callback')->get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

	Route::name('provider.facebook')->get('/login/facebook')->uses('Auth\LoginController@redirectToFacebook');
	Route::name('provider.facebook.callback')->get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Auth::routes();

Route::name('home')->get('/home', 'AppController@index');

Route::name('update.user')->post('/home/update/{user_slug}')->uses('UserController@update');

/**
* job applications routes
*/
Route::prefix('profile/{user_slug}/jobapplication')->group(function() {
    Route::name('job')->get('/{slug}')->uses('JobApplicationController@job');

    Route::name('new.application')->get('/create/new-job-application')->uses('JobApplicationController@newJobApplication');
    Route::name('create.new.application')->post('/create/new-job-application')->uses('JobApplicationController@create');
});


/**
 * decomposer route
 */

	Route::group(['middleware' => 'auth'], function() {
		Route::get('decompose', '\Lubusin\Decomposer\Controllers\DecomposerController@index');
	});

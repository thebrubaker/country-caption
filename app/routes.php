<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Pages - Home / Terms
 */
Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index'	
]);

Route::get('/terms', [
	'as' => 'terms',
	'uses' => 'HomeController@showTerms'	
]);

/**
 * Memes - Create / Edit / Delete
 */
Route::get('/memes/create/{filename}', [
	'as' => 'memes.create',
	'uses' => 'MemeController@create'
]);

Route::post('/memes/create/{filename}', [
	'as' => 'memes.create',
	'before' => 'csrf',
	'uses' => 'MemeController@store'
]);

/**
 * Memes - Show / Popular / Most Recent / Owned Memes
 */
Route::get('/memes/show/{slug}', [
	'as' => 'memes.show',
	'uses' => 'MemeController@show'
]);

Route::get('/memes/popular', [
	'as' => 'memes.popular',
	'uses' => 'MemeController@showPopular'
]);

Route::get('/memes/owned', [
	'as' => 'memes.owned',
	'uses' => 'MemeController@showOwned'
]);

/**
 * Memes - Like / Unlike
 */
Route::get('/memes/like/{slug}', [
	'as' => 'memes.like',
	'uses' => 'MemeController@like'
]);

Route::get('/memes/unlike/{slug}', [
	'as' => 'memes.unlike',
	'uses' => 'MemeController@unLike'
]);

/**
 * Admin - Review / Approve / Deny / All
 */
Route::group(['before' => ['auth|admin']], function() {

	Route::get('/admin/review', [
		'as' => 'admin.review',
		'uses' => 'AdminController@review'
	]);

	Route::get('/admin/approve/{slug}', [
		'as' => 'admin.approve',
		'uses' => 'AdminController@approve'
	]);

	Route::get('/admin/deny/{slug}', [
		'as' => 'admin.deny',
		'uses' => 'AdminController@deny'
	]);

	Route::get('/admin/all', [
		'as' => 'admin.all',
		'uses' => 'AdminController@all'
	]);

});

// /**
//  * Used for testing
//  */
// Route::get('test', function() {

// });

/**
 * Sessions - Login / Logout
 */

Route::post('/sessions/login', [
	'as' => 'login',
	'before' => 'csrf',
	'uses' => 'SessionsController@store'
]);

// Route::get('/login', [
// 	'as' => 'login',
// 	'uses' => 'SessionsController@create'	
// ]);


Route::get('/sessions/logout', [
	'as' => 'logout',
	'uses' => 'SessionsController@logout'	
]);

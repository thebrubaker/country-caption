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

Route::get('/', [
	'as' => 'home_path',
	'uses' => 'HomeController@index'	
]);

Route::get('/customize/{filename}', [
	'as' => 'customize_path',
	'uses' => 'CustomizeController@create'
]);

Route::post('/customize/{filename}', [
	'as' => 'customize_path',
	'uses' => 'CustomizeController@store'
]);

Route::get('/reactions/popular', [
	'as' => 'popular_path',
	'uses' => 'ReactionsController@showPopular'
]);

Route::get('/reactions/view', [
	'as' => 'reactions_path',
	'uses' => 'ReactionsController@show'
]);

Route::get('test', [
	'as' => 'test_path',
	'uses' => 'HomeController@test'
]);
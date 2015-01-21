<?php

use Rescue\Memes\Meme;
use Rescue\Users\User;

class SessionsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function create()
	{
		$user = Auth::user();

		if($user) {

			return Redirect::home();

		}

		return View::make('pages.login');
	}

	public function store()
	{
		$user = Auth::user();

		if($user) {

			return Redirect::home();

		}

		// Find if the user already exists
		$user = User::where('facebook_id', '=', Input::get('facebook_id'))->first();

		// Check that the user doesn't exist
		if(!$user) {
			// No user found, create a new user object to be filled with data
			$user = new User;

			// Get input data
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->facebook_id = Input::get('facebook_id');

			// Save the user
			$user->save();
		}

		Auth::login($user);

		return Redirect::back();
	}

	public function logout()
	{

		Auth::logout();

		return Redirect::home();

	}

}

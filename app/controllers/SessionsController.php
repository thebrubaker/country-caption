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

		$user = User::find('facebook_id', '=', Input::get('id'));

		// Check if the user exists
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
	}

	public function logout()
	{

		Auth::logout();

		return Redirect::home();

	}

}

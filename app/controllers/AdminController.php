<?php

use Rescue\Memes\Meme;
use Rescue\Users\User;

class AdminController extends BaseController {

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

	public function review()
	{

		// Get all memes and their associated users
		$memes = Meme::with('users')
			->where('approved', '=', false)
			->get()
			->sortBy('updated_at');

		// Set the number of memes you want to display per page
		$perPage = 6;

		// Do something funky to figure out what page to display of the pagination
		$currentPage = ((Input::get('page')) ? Input::get('page') : 1) - 1;

		// Slice up the $memes collection to just grab the set you need for this page
		$pagedData = $memes->slice($currentPage * $perPage, $perPage)->all();

		// Turn them into a paginated object
		$memes = Paginator::make($pagedData, count($memes), $perPage);

		return View::make('admin.review', compact('memes'));
	}


	public function approve($slug)
	{

		$meme = Meme::where('slug', '=', $slug)->first();

		$meme->approved = true;

		$meme->save();

		Flash::overlay('Meme approved.');

		return Redirect::back();
	}

	public function deny($slug)
	{

		$meme = Meme::where('slug', '=', $slug)->first();

		$meme->approved = false;

		$meme->save();

		Flash::overlay('Meme denied.');

		return Redirect::back();
	}

	public function all()
	{

		// Get all memes and their associated users
		$memes = Meme::with('users')
			->get()
			->sortBy('updated_at');

		// Set the number of memes you want to display per page
		$perPage = 6;

		// Do something funky to figure out what page to display of the pagination
		$currentPage = ((Input::get('page')) ? Input::get('page') : 1) - 1;

		// Slice up the $memes collection to just grab the set you need for this page
		$pagedData = $memes->slice($currentPage * $perPage, $perPage)->all();

		// Turn them into a paginated object
		$memes = Paginator::make($pagedData, count($memes), $perPage);

		return View::make('admin.review', compact('memes'));

	}


}

<?php

use Rescue\Memes\Meme;
use Rescue\Users\User;

class MemeController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /meme/create
	 *
	 * @return Response
	 */
	public function create($filename)
	{
		$meme = Meme::getTemplateByFilename($filename);

		return View::make('memes.create', compact('meme'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /meme/create
	 *
	 * @return Response
	 */
	public function store($filename)
	{
		// Find user from facebook id submitted during meme creation
		$user = User::where('facebook_id', '=', Input::get('facebook_id'))->first();

		// Check if the user doesn't already exist
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

		// Grab the image data from the form and turn it into an image object
		$image = Image::make(Input::get('imagedata'));

		// Set the full path for saving the image
		$imagePath = Config::get('memes.custmomizedPath') . 'meme_' . time() . '.jpg';

		// Save the image
		$image->save($imagePath);

		// Create a new meme object to be filled with data
		$meme = new Meme;

		// Set Meme attributes
		$meme->slug = $image->filename;
		$meme->file_path = $imagePath;
		$meme->approved = false;
		$meme->week = Config::get('memes.week');

		// Save the meme and tie it to the current user
		$user->meme()->save($meme);

		// Log in the user so they are remembered
		Auth::login($user, true);

		Flash::warning('Your meme reaction is being reviewed.');

		// Redirect to view the newly created Meme
		return Redirect::to('memes/show/' . $meme->slug);
	}

	/**
	 * Display the specified resource.
	 * GET /reactions/{id}
	 *
	 * @param  int  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		$meme = Meme::where('slug', '=', $slug)->first();

		if(!$meme) {

			Flash::overlay('This meme does not exist.');

			return Redirect::home();
		}

		return View::make('memes.show', compact('meme'));
	}

	/**
	 * User likes a meme
	 * GET /memes/like/{slug}
	 *
	 * @param  int  $slug
	 * @return Redirect
	 */
	public function like($slug)
	{

		// Get the current user
		$user = Auth::user();

		// If there is no current user, send a flash message to login
		if(!$user) {

			Flash::overlay('You must login through Facebook in order to like a meme.<br /><button id="login_btn" class="btn btn-primary">Login</button>');

			return Redirect::back();
		}
		
		// Get the meme from the url
		$meme = Meme::where('slug', '=', $slug)->first();

		// If there is no meme, then go back and let them know the meme doesn't exist
		if(!$meme) {

			Flash::overlay('That meme does not exist.');
			
			return Redirect::route('home');

		}

		// Check if the user has already liked the meme
		if ($user->memes->contains($meme->id)) {
			
			Flash::overlay('You have already liked this meme.');
			
			return Redirect::back();
		}

		// Add this meme to the list of memes this user likes
		$user->memes()->attach($meme);

		Flash::success('The meme has been liked.');
		// Head back to where they liked the meme
		return Redirect::back();
	}

	/**
	 * User un-likes a meme
	 * GET /memes/like/{slug}
	 *
	 * @param  int  $slug
	 * @return Redirect
	 */
	public function unLike($slug)
	{

		// Get the current user
		$user = Auth::user();

		// If there is no current user, send a flash message to login
		if(!$user) {

			Flash::overlay('You must login through Facebook to unlike a meme.');

			return Redirect::back();
		}
		
		// Get the meme from the url
		$meme = Meme::where('slug', '=', $slug)->first();

		// If there is no meme, then go back and let them know the meme doesn't exist
		if(!$meme) {

			Flash::overlay('That meme does not exist.');
			
			return Redirect::route('home');

		}

		// Check if the user doesn't like this particular meme
		if (!$meme->users->find($user->id)) {
			
			Flash::overlay('You do not like this meme.');
			
			return Redirect::back();
		}

		// Remove this meme to the list of memes this user likes
		$user->memes()->detach($meme);

		Flash::warning('The meme has been unliked.');
		// Head back to where they unliked the meme
		return Redirect::back();
	}

	/**
	 * Display a listing of the resource.
	 * GET /memes/popular
	 *
	 * @return Response
	 */
	public function showPopular()
	{
		$user = Auth::user();

		// Get this week's trigger image
		$triggerImage = Config::get('memes.triggerImage');

		// Get all memes and their associated users
		$memes = Meme::with('users')
			->where('approved', '=', '1')
			->where('week', '=', Config::get('memes.week'))
			->get()

			// Sort by the number of likes
			->sortBy(function($memes)
			{
    			return $memes->users->count();
			})

			->reverse();

		// Set the number of memes you want to display per page
		$perPage = 6;

		// Do something funky to figure out what page to display of the pagination
		$currentPage = ((Input::get('page')) ? Input::get('page') : 1) - 1;

		// Slice up the $memes collection to just grab the set you need for this page
		$pagedData = $memes->slice($currentPage * $perPage, $perPage)->all();

		// Turn them into a paginated object
		$memes = Paginator::make($pagedData, count($memes), $perPage);

		// Pass them into the view
		return View::make('memes.popular', compact('triggerImage', 'memes'));
	}

	/**
	 * Display a listing of owned memes
	 * GET /memes/owned
	 */
	public function showOwned()
	{
		$user = Auth::user();

		if(!$user) {
			return Redirect::home();
		}

		// Get all memes and their associated users
		$memes = Meme::with('users')
			->where('user_id', '=', $user->id)
			->get()

			// Sort by the number of likes
			->sortBy(function($memes)
			{
    			return $memes->users->count();
			})

			->reverse();

		// Set the number of memes you want to display per page
		$perPage = 6;

		// Do something funky to figure out what page to display of the pagination
		$currentPage = ((Input::get('page')) ? Input::get('page') : 1) - 1;

		// Slice up the $memes collection to just grab the set you need for this page
		$pagedData = $memes->slice($currentPage * $perPage, $perPage)->all();

		// Turn them into a paginated object
		$memes = Paginator::make($pagedData, count($memes), $perPage);

		// Pass them into the view
		return View::make('memes.owned', compact('memes'));
	}

}
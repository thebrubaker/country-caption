<?php

use Rescue\Memes\Meme;
use Rescue\Users\User;

class HomeController extends BaseController {

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

	public function test()
	{

	}

	public function index()
	{
		$triggerImage = Config::get('memes.triggerImage');

		$memeTemplates = Meme::getTemplates();

		return View::make('pages.home', compact('triggerImage', 'memeTemplates'));
	}

	public function showTerms()
	{
		return View::make('pages.terms');
	}

}

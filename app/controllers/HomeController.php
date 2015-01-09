<?php

use Rescue\ReactionImage\ReactionImage;

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
		$reactionImages = ReactionImage::getAllImages();

		return View::make('home.index', ['reactionImages' => $reactionImages]);
	}

	public function customizeReaction($filename)
	{

		$reaction = ReactionImage::getByFilename($filename);

		return View::make('layouts.home.customize', ['reaction' => $reaction]);

	}

	public function saveReaction($filename)
	{

		$data = $_POST['imagedata'];

		$image = Image::make($data);

		$image->save('images/reactions/customized/test.jpg');

	}
}

<?php namespace Rescue\ReactionImage;

class ReactionImage {

	public static function getByFilename($filename)
	{
		$filepath = 'images/reactions/active/' . $filename . '.jpg';

		$reaction = \Image::make($filepath);

		return $reaction;
	}

	public static function getAllImages()
	{
		$files = glob('images/reactions/active/*.jpg');

		$reactionImagess = [];

		foreach ($files as $file) {
			$reactionImages[] = \Image::make($file);
		}

		return $reactionImages;
	}
}
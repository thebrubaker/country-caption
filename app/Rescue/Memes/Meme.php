<?php namespace Rescue\Memes;

use Rescue\Users\User;

class Meme extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'memes';

	public function user() {
		return $this->belongsTo('Rescue\Users\User');
	}

	public function users() {
		return $this->belongsToMany('Rescue\Users\User')->withTimestamps();
	}

	public static function getTemplates() {

		$files = glob('images/memes/templates/*.jpg');

		$memes = [];

		foreach ($files as $file) {
			$memes[] = \Image::make($file);
		}

		return $memes;
	}

	public static function getTemplateByFilename($filename)
	{
		$filepath = \Config::get('memes.templatePath') . '/' . $filename . '.jpg';

		return $filepath;
	}

}

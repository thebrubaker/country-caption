<?php namespace Rescue\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Rescue\Memes\Meme;


class User extends \Eloquent implements UserInterface {

	use UserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * This user will create and own many memes
	 * @return 
	 */
	public function meme() {
		return $this->hasMany('Rescue\Memes\Meme');
	}

	/**
	 * This user will belong to many memes as a "like"
	 */
	public function memes() {
		return $this->belongsToMany('Rescue\Memes\Meme')->withTimestamps();
	}

	/**
	 * Check if this user has admin privileges to review memes
	 */
	public function isAdmin()
	{
		return $this->is_admin;
	}

}

<?php namespace Rescue\Users;

use Rescue\Users\User;

class EloquentUserRepository extends \Eloquent implements UserRepository {

	public function getAll()
	{
		return User::all();
	}
}
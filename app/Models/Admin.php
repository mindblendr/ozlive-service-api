<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
	use HasFactory, Notifiable;
	protected $table = 'admin';
	protected $guard = 'admin';

	protected $fillable = [
		'username',
		'password'
	];

	protected $hidden = [
		'password'
	];

	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	public function getJWTCustomClaims()
	{
		return [ 'guard' => 'admin' ];
	}
}

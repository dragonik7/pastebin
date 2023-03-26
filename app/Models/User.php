<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable
{

	use HasApiTokens, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'permissions',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var string[]
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'permissions',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var string[]
	 */
	protected $casts = [
		'permissions'       => 'array',
		'email_verified_at' => 'datetime',
	];

	/**
	 * The attributes for which you can use filters in url.
	 *
	 * @var string[]
	 */
	protected $allowedFilters = [
		'id',
		'name',
		'email',
		'permissions',
	];

	/**
	 * The attributes for which can use sort in url.
	 *
	 * @var string[]
	 */
	protected $allowedSorts = [
		'id',
		'name',
		'email',
		'updated_at',
		'created_at',
	];

	public function password(): Attribute
	{
		return Attribute::make(
			get: fn($value) => $value,
			set: fn($value) => Hash::make($value),
		);
	}
}

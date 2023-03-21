<?php

namespace App\Http\Service;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\NewAccessToken;
use Nette\Schema\ValidationException;

class UserService
{

	/**
	 * @param  RegisterUserRequest  $request
	 * @return User
	 */
	public function register(RegisterUserRequest $request): User
	{
		$data = $request->toArray();
		$user = User::create($data);
		event(new Registered($user));
		return $user;
	}

	/**
	 * @param  LoginUserRequest  $request
	 * @return NewAccessToken
	 */
	public function login(LoginUserRequest $request): NewAccessToken
	{
		$user = User::query()->withTrashed()->firstWhere('email', '=', $request->email);
		if ($user || Hash::check($request->password, $user->password)) {
			return $user->createToken(
				name     : $request->ip() . "|" . $request->userAgent(),
				expiresAt: Carbon::parse(Carbon::now()->add('3month'))
			);
		}
		throw new HttpResponseException(
			response()->json(['Password or email incorrect'], 400),
		);
	}
}
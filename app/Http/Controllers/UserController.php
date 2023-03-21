<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Resources\User\InfoUserResource;
use App\Http\Resources\User\LoginUserResource;
use App\Http\Service\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  RegisterUserRequest  $request
	 * @param  UserService  $createService
	 * @return InfoUserResource
	 */
    public function store(RegisterUserRequest $request, UserService $createService): InfoUserResource
    {
		$user = $createService->register($request);
		return InfoUserResource::make($user);
    }

	/**
	 * @param  LoginUserRequest  $loginUserRequest
	 * @param  UserService  $loginService
	 * @return LoginUserResource
	 */
	public function login(LoginUserRequest $loginUserRequest, UserService $loginService): LoginUserResource
	{
		$token = $loginService->login($loginUserRequest);
		return LoginUserResource::make($token);
	}
}

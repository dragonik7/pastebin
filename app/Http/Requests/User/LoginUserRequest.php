<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;

class LoginUserRequest extends BaseApiRequest
{

	/**
	 * @return array<string, array<string>>
	 */
	public function rules(): array
	{
		return [
			'email'    => ['email', 'exists:users,email', 'required'],
			'password' => ['string', 'min:8', 'required'],
		];
	}
}
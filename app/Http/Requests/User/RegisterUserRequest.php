<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends BaseApiRequest
{

	public function rules(): array
	{
		return [
			'name'         => ['string', 'max:255', 'required'],
			'email'        => ['unique:users,email', 'max:255', 'required'],
			'password'     => ['string', 'min:4', 'max:255', 'required', 'confirmed'],
		];
	}
}
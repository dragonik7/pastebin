<?php

namespace App\Http\Requests\Code;

use App\Enum\CodeAccessState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class CodeCreateRequest extends FormRequest
{

	/**
	 * @return array<string,array<int,Enum|string>>
	 */
	public function rules(): array
	{
		return [
			'text'            => ['required'],
			'access'          => ['required', new Enum(CodeAccessState::class)],
			'expiration_time' => ['nullable', 'date'],
			'language_id'     => ['nullable'],
		];
	}

	protected function passedValidation()
	{
		$this->merge(['user_id' => Auth::id()]);
	}
}

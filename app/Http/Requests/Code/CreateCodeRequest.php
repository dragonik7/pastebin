<?php

namespace App\Http\Requests\Code;

use App\Enum\CodeAccessState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateCodeRequest extends FormRequest
{

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
		$this->merge(['user_id' => \Auth::id()]);
	}
}

<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ReportCreateRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'title' => ['nullable', 'string'],
		];
	}

	protected function passedValidation()
	{
		$this->merge([
			'user_id' => Auth::id(),
		]);
	}
}

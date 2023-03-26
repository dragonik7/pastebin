<?php

namespace App\Http\Service;

use App\Http\Requests\Code\CreateCodeRequest;
use App\Models\Code;

class CodeService
{

	/**
	 * @param  CreateCodeRequest  $codeRequest
	 * @return Code
	 */
	public function create(CreateCodeRequest $codeRequest)
	{
		$data = $codeRequest->all();
		return Code::create($data);
	}
}
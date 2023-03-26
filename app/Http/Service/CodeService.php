<?php

namespace App\Http\Service;

use App\Http\Requests\Code\CodeCreateRequest;
use App\Models\Code;

class CodeService
{

	/**
	 * @param  CodeCreateRequest  $codeRequest
	 * @return Code
	 */
	public function create(CodeCreateRequest $codeRequest)
	{
		$data = $codeRequest->all();
		return Code::create($data);
	}
}
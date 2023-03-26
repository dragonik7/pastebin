<?php

namespace App\Http\Service;

use App\Http\Requests\Code\CreateCodeRequest;
use App\Models\Code;

class CodeService
{

	public function create(CreateCodeRequest $codeRequest)
	{
		$data = $codeRequest->all();
		return Code::create($data);
	}
}
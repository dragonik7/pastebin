<?php

namespace App\Http\Service;

use App\Http\Requests\Report\ReportCreateRequest;
use App\Models\Code;
use App\Models\Report;

class ReportService
{

	/**
	 * @param  Code  $code
	 * @param  ReportCreateRequest  $createRequest
	 * @return Report
	 */
	public function create(Code $code, ReportCreateRequest $createRequest): Report
	{
		$data = $createRequest->all();
		return $code->reports()->create($data);
	}
}
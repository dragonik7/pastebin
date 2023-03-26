<?php

namespace App\Http\Controllers;

use App\Http\Requests\Report\ReportCreateRequest;
use App\Http\Resources\Report\ReportResource;
use App\Http\Service\ReportService;
use App\Models\Code;

class ReportsController extends Controller
{

	/**
	 * @param  Code  $code
	 * @param  ReportCreateRequest  $request
	 * @param  ReportService  $reportService
	 * @return ReportResource
	 */
	public function store(Code $code, ReportCreateRequest $request, ReportService $reportService)
	{
		$report = $reportService->create($code, $request);
		return ReportResource::make($report);
	}
}
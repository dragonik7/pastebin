<?php

namespace App\Http\Controllers;

use App\Enum\CodeAccessState;
use App\Http\Requests\Code\CreateCodeRequest;
use App\Http\Resources\Code\CodeResource;
use App\Http\Service\CodeService;
use App\Models\Code;
use App\Repository\Code\Interface\CodeRepositoryInterface;
use Carbon\Carbon;

class CodesController extends Controller
{

	private CodeRepositoryInterface $codeRepository;

	public function __construct(CodeRepositoryInterface $codeRepository)
	{
		$this->codeRepository = $codeRepository;
	}

	public function getPublicCodes()
	{
		$codes = $this->codeRepository->getList()->paginate(10);
		return CodeResource::collection($codes);
	}

	public function getCreatedCodes()
	{
		$codes = $this->codeRepository->getList()->where('user_id', '=', \Auth::id());
		return CodeResource::collection($codes);
	}

	public function store(CreateCodeRequest $codeRequest, CodeService $codeService)
	{
		$code = $codeService->create($codeRequest);
		return CodeResource::make($code);
	}

	public function show(Code $code)
	{
		return ($code->expiration_time > Carbon::now()) & (($code->access != CodeAccessState::Private->value) | ($code->user_id == \Auth::id())) ? CodeResource::make($code) : abort(403);
	}

}
<?php

namespace App\Http\Controllers;

use App\Enum\CodeAccessState;
use App\Http\Requests\Code\CodeCreateRequest;
use App\Http\Resources\Code\CodeResource;
use App\Http\Service\CodeService;
use App\Models\Code;
use App\Repository\Code\Interface\CodeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CodesController extends Controller
{

	private CodeRepositoryInterface $codeRepository;

	/**
	 * @param  CodeRepositoryInterface  $codeRepository
	 */
	public function __construct(CodeRepositoryInterface $codeRepository)
	{
		$this->codeRepository = $codeRepository;
	}

	/**
	 * @return AnonymousResourceCollection
	 */
	public function getPublicCodes()
	{
		$codes = $this->codeRepository->getList()
			->where('access', '=', CodeAccessState::Public->value)
			->paginate(10);
		return CodeResource::collection($codes);
	}

	/**
	 * @return AnonymousResourceCollection
	 */
	public function getCreatedCodes()
	{
		$codes = $this->codeRepository->getList()
			->where('user_id', '=', \Auth::id())
			->paginate(10);
		return CodeResource::collection($codes);
	}

	/**
	 * @param  CodeCreateRequest  $codeRequest
	 * @param  CodeService  $codeService
	 * @return CodeResource
	 */
	public function store(CodeCreateRequest $codeRequest, CodeService $codeService)
	{
		$code = $codeService->create($codeRequest);
		return CodeResource::make($code);
	}

	/**
	 * @param  Code  $code
	 * @return CodeResource|never
	 */
	public function show(Code $code)
	{
		return ($code->expiration_time > Carbon::now()) & (($code->access != CodeAccessState::Private->value) | ($code->user_id == \Auth::id())) ? CodeResource::make($code) : abort(403);
	}

}
<?php

namespace App\Repository\Code;

use App\Enum\CodeAccessState;
use App\Models\Code;
use App\Repository\Code\Interface\CodeRepositoryInterface;
use Carbon\Carbon;

class CodeRepository implements CodeRepositoryInterface
{

	public function getList()
	{
		return Code::query()->where(function ($query)
		{
			$query->where('expiration_time', '>', Carbon::now())
				->orWhereNull('expiration_time', '>', Carbon::now());
		})
			->where('access', '=', CodeAccessState::Public->value);
	}

	public function show()
	{

		return Code::first();
	}
}
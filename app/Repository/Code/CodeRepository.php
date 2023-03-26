<?php

namespace App\Repository\Code;

use App\Models\Code;
use App\Repository\Code\Interface\CodeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CodeRepository implements CodeRepositoryInterface
{

	/**
	 * @return Builder<Code>
	 */
	public function getList(): Builder
	{
		return Code::query()->where(function ($query)
		{
			$query->where('expiration_time', '>', Carbon::now())
				->orWhereNull('expiration_time');
		})
			->orderBy('created_at', 'asc');
	}
}
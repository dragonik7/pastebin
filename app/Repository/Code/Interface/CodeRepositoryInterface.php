<?php

namespace App\Repository\Code\Interface;

use App\Models\Code;
use Illuminate\Database\Eloquent\Builder;

interface CodeRepositoryInterface
{

	/**
	 * @return Builder<Code>
	 */
	public function getList();
}
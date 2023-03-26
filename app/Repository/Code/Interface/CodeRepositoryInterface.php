<?php

namespace App\Repository\Code\Interface;

use Illuminate\Database\Eloquent\Builder;

interface CodeRepositoryInterface
{

	public function getList(): Builder;
}
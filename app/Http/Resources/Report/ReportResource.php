<?php

namespace App\Http\Resources\Report;

use App\Http\Resources\Code\CodeResource;
use App\Http\Resources\User\InfoUserResource;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Report */
class ReportResource extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array<string,int|string>
	 */
	public function toArray($request): array
	{
		return [
			'id'    => $this->id,
			'title' => $this->title,
			'user'  => new InfoUserResource($this->user),
			'code'  => new CodeResource($this->code),
		];
	}
}

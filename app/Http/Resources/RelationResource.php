<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 */
class RelationResource extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array<string, string>
	 */
	public function toArray($request)
	{
		return [
			'id'    => $this->id,
			'title' => $this->title,
		];
	}
}

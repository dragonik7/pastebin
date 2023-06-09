<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class InfoUserResource extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array<string, int|string>
	 */
	public function toArray($request)
	{
		return [
			'id'           => $this->id,
			'name'         => $this->name,
			'email'        => $this->email,
		];
	}
}

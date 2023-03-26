<?php

namespace App\Http\Resources\Code;

use App\Http\Resources\RelationResource;
use App\Http\Resources\User\InfoUserResource;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Code */
class CodeResource extends JsonResource
{

	/**
	 * @param  Request  $request
	 * @return array<string, string|JsonResource>
	 */
	public function toArray($request)
	{
		return [
			'id'              => $this->id,
			'text'            => $this->text,
			'access'          => $this->access,
			'expiration_time' => $this->expiration_time,
			'user'            => new InfoUserResource($this->user),
			'language_id'     => new RelationResource($this->language),
			'created_at'      => $this->created_at,
		];
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Code extends Model
{

	use HasUuids, HasFactory, Filterable, AsSource;

	protected $fillable = [
		'text',
		'access',
		'user_id',
		'expiration_time',
		'language_id',
	];

	protected $allowedFilters = [
		'user_id',
		'access',
		'created_at',
		'updated_at',
	];

	/**
	 * @var array
	 */
	protected $allowedSorts = [
		'access',
		'user_id',
		'created_at',
		'updated_at',
	];
	protected $casts        = [
		'expiration_time' => 'datetime:Y-m-d H:i:s',
		'created_at'      => 'datetime:Y-m-d H:i:s',
		'updated_at'      => 'datetime:Y-m-d H:i:s',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function language(): BelongsTo
	{
		return $this->belongsTo(Language::class);
	}
}
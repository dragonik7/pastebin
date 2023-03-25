<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Report extends Model
{

	use Filterable, AsSource, HasFactory;

	protected $fillable       = [
		'title',
		'user_id',
		'code_id',
	];
	protected $allowedFilters = [
		'user_id',
		'code_id',
		'created_at',
	];

	/**
	 * @var array
	 */
	protected $allowedSorts = [
		'user_id',
		'code_id',
		'created_at',
	];
	protected $casts        = [
		'created_at' => 'datetime:Y-m-d H:i:s',
		'updated_at' => 'datetime:Y-m-d H:i:s',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function code(): BelongsTo
	{
		return $this->belongsTo(Code::class);
	}
}
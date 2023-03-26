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

	/**
	 * @var string[]
	 */
	protected $fillable = [
		'title',
		'user_id',
		'code_id',
	];
	/**
	 * @var string[]
	 */
	protected array $allowedFilters = [
		'user_id',
		'code_id',
		'created_at',
	];

	/**
	 * @var string[]
	 */
	protected array $allowedSorts = [
		'user_id',
		'code_id',
		'created_at',
	];
	/**
	 * @var array<string,string>
	 */
	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s',
		'updated_at' => 'datetime:Y-m-d H:i:s',
	];

	/**
	 * @phpstan-return BelongsTo<User,Report>
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * @phpstan-return BelongsTo<Code,Report>
	 */
	public function code(): BelongsTo
	{
		return $this->belongsTo(Code::class);
	}
}
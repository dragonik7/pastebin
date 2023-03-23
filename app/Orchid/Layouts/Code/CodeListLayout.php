<?php

namespace App\Orchid\Layouts\Code;

use App\Models\Code;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CodeListLayout extends Table
{

	/**
	 * Data source.
	 *
	 * The name of the key to fetch it from the query.
	 * The results of which will be elements of the table.
	 *
	 * @var string
	 */
	protected $target = 'codes';

	/**
	 * Get the table cells to be displayed.
	 *
	 * @return TD[]
	 */
	protected function columns(): iterable
	{
		return [
			TD::make('id', 'Id')
				->width(300)
				->render(fn(Code $code) => Group::make([
					Link::make($code->id)
						->route('platform.systems.codes.edit', $code->id),
				])),
			TD::make('access', 'Access')->filter(TD::FILTER_SELECT,
				['public' => 'public', 'unlisted' => 'unlisted', 'private' => 'private'])->sort(),
			TD::make('text', 'Code')
				->render(function (Code $code)
				{
					return Str::limit($code->text);
				})
				->width(250),
			TD::make('user_id', 'User')
				->render(function (Code $code)
				{
					return is_null($code->user) ? null : Group::make([
						Link::make($code->user->name)->route('platform.systems.users.edit', $code->user),
					]);
				})
				->sort()->width(200),
			TD::make('created_at', 'Created')
				->sort(),
			TD::make('expiration_time', 'expiration time')
				->sort(),
			TD::make('updated_at', 'Updated')
				->sort()
				->defaultHidden(),
		];
	}
}

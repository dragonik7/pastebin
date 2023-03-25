<?php

namespace App\Orchid\Layouts\Report;

use App\Models\Report;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ReportListLayout extends Table
{

	/**
	 * Data source.
	 *
	 * The name of the key to fetch it from the query.
	 * The results of which will be elements of the table.
	 *
	 * @var string
	 */
	protected $target = 'reports';

	/**
	 * Get the table cells to be displayed.
	 *
	 * @return TD[]
	 */
	protected function columns(): iterable
	{
		return [
			TD::make('id', 'Id')
				->width(100),
			TD::make('title', 'Title')
				->width(250),
			TD::make('code_id', 'Code')
				->render(function (Report $report)
				{
					return Group::make([
						Link::make(Str::limit($report->code->text, 20))->route('platform.systems.codes.edit',
							$report->code_id),
					]);
				})
				->sort(),
			TD::make('user_id', 'User')
				->render(function (Report $report)
				{
					return is_null($report->user) ? null : Group::make([
						Link::make($report->user->name)->route('platform.systems.users.edit', $report->user),
					]);
				})
				->sort()->width(200),
			TD::make('created_at', 'Created')
				->sort(),
			TD::make('updated_at', 'Updated')
				->sort()
				->defaultHidden(),
		];
	}
}

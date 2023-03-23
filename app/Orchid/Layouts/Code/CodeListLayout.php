<?php

namespace App\Orchid\Layouts\Code;

use App\Enum\CodeAccessState;
use App\Models\Code;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
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
			TD::make('id', 'Id')->width(300),
			TD::make('access', 'Access')->filter(TD::FILTER_SELECT,
				['public' => 'public', 'unlisted' => 'unlisted', 'private' => 'private'])->sort(),
			TD::make('code', 'Code')
				->render(function (Code $code){
					return Str::limit($code->code);
				})
				->width(250),
			TD::make('user_id', 'User')
				->render(function (Code $code)
				{
					return Group::make([
						Link::make($code->user->name)->route('platform.systems.users.edit',$code->user)
					]);
				})
				->sort()->width(200),
			TD::make('created_at', 'Created')
				->sort(),
			TD::make('updated_at', 'Updated')
				->sort(),
		];
	}
}

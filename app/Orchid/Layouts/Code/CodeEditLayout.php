<?php

namespace App\Orchid\Layouts\Code;

use App\Models\Language;
use App\Models\User;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class CodeEditLayout extends Rows
{

	/**
	 * Get the fields elements to be displayed.
	 *
	 * @return Field[]
	 */
	protected function fields(): iterable
	{
		return [
			TextArea::make('code.text')
				->required()
				->title('Code')
				->rows(15),
			Select::make('code.user_id')
				->fromModel(User::whereNull('deleted_at'), 'name', 'id')
				->title('user')
				->empty('Не выбран'),
			Select::make('code.access')
				->options([
					'public'   => 'public',
					'unlisted' => 'unlisted',
					'private'  => 'private',
				])
				->title('access')
				->required(),
			DateTimer::make('code.expiration_time')
				->title('expiration time'),
			Select::make('code.language_id')
				->fromModel(Language::all(), 'title', 'id')
				->title('Language')
				->empty('Не выбран'),
		];
	}
}

<?php

namespace App\Orchid\Screens\Code;

use App\Models\Code;
use App\Orchid\Layouts\Code\CodeListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class CodeListScreen extends Screen
{

	/**
	 * Fetch data to be displayed on the screen.
	 *
	 * @return array
     */
    public function query(): iterable
    {
        return [
			'codes' => Code::filters()->defaultSort('created_at', 'desc')->paginate(6)
		];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Codes';
    }

	/**
	 * The description is displayed on the user's screen under the heading
	 */
	public function description(): ?string
	{
		return "All codes";
	}

	/**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
	{
		return [
			Link::make(__('Add'))
				->icon('plus')
				->route('platform.systems.codes.create'),
		];
	}

    /**
     * The screen's layout elements.
     *
     * @return Layout[]|string[]
     */
    public function layout(): array
    {
        return [
			CodeListLayout::class,
		];
    }
}

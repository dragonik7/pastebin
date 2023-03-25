<?php

namespace App\Orchid\Screens\Reports;

use App\Models\Report;
use App\Orchid\Layouts\Report\ReportListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class ReportListScreen extends Screen
{

	/**
	 * Fetch data to be displayed on the screen.
	 *
	 * @return array
	 */
	public function query(): iterable
	{
		return [
			'reports' => Report::filters()->defaultSort('created_at', 'asc')->paginate(10),
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
			ReportListLayout::class,
		];
	}
}

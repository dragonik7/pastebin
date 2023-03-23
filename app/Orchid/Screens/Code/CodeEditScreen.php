<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Code;

use App\Enum\CodeAccessState;
use App\Models\Code;
use App\Orchid\Layouts\Code\CodeEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CodeEditScreen extends Screen
{

	/**
	 * @var Code
	 */
	public Code $code;

	/**
	 * Fetch data to be displayed on the screen.
	 *
	 * @param  Code  $code
	 *
	 * @return array
	 */
	public function query(Code $code): iterable
	{
		$code->load(['user']);
		return [
			'code' => $code,
		];
	}

	/**
	 * The name of the screen displayed in the header.
	 *
	 * @return string|null
	 */
	public function name(): ?string
	{
		return $this->code->exists ? 'Edit code' : 'Create code';
	}

	/**
	 * Display header description.
	 *
	 * @return string|null
	 */
	public function description(): ?string
	{
		return 'Details such as code, user, language, and access';
	}

	/**
	 * @return iterable|null
	 */
	public function permission(): ?iterable
	{
		return [
			'platform.systems.users',
		];
	}

	/**
	 * The screen's action buttons.
	 *
	 * @return Action[]
	 */
	public function commandBar(): iterable
	{
		return [
			Button::make(__('Remove'))
				->icon('trash')
				->method('remove')
				->canSee($this->code->exists),

			Button::make(__('Save'))
				->icon('check')
				->method('save'),
		];
	}

	/**
	 * @return \Orchid\Screen\Layout[]
	 */
	public function layout(): iterable
	{
		return [

			Layout::block(CodeEditLayout::class)
				->title(__('Paste Information'))
				->commands(
					Button::make(__('Save'))
						->type(Color::DEFAULT())
						->icon('check')
						->method('save')
				),
		];
	}

	/**
	 * @param  Code  $code
	 * @param  Request  $request
	 *
	 * @return RedirectResponse
	 */
	public function save(Code $code, Request $request)
	{
		$data = $request->validate([
			'text'            => ['string'],
			'user_id'         => ['nullable'],
			'access'          => [new Enum(CodeAccessState::class)],
			'expiration_time' => ['date', 'nullable'],
			'language_id'     => ['nullable'],
		]);
		$code->fill($data)->save();

		Toast::info(__('Code was saved.'));

		return redirect()->route('platform.systems.codes');
	}

	/**
	 * @param  Code  $code
	 * @return RedirectResponse
	 */
	public function remove(Code $code)
	{
		$code->delete();

		Toast::info(__('Code was removed'));

		return redirect()->route('platform.systems.codes');
	}
}

<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{

	protected $model = Report::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition(): array
	{
		return [
			'title'   => $this->faker->word(),
			'user_id' => User::query()->get()->random()->id,
			'code_id' => Code::query()->get()->random()->id,
		];
	}
}

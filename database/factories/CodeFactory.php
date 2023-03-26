<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodeFactory extends Factory
{

	protected $model = Code::class;

	public function definition(): array
	{
		return [
			'text'            => $this->faker->sentence(20, 30),
			'user_id'         => User::query()->get()->random()->id,
			'access'          => $this->faker->randomElement(['public', 'unlisted', 'private']),
			'expiration_time' => $this->faker->dateTimeBetween(now(), '+1year'),
			'language_id'     => Language::query()->get()->random()->id,
		];
	}
}

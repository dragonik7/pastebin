<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CodeFactory extends Factory
{

	protected $model = Code::class;

	public function definition(): array
	{
		return [
			'code'           => $this->faker->sentence(20,30),
			'user_id'         => User::query()->get()->random()->id,
			'access_id'       => random_int(1,3),
			'expiration_time' => Carbon::now(),
			'language_id'     => Language::query()->get()->random()->id,
		];
	}
}

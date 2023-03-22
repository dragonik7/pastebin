<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{

	public function run(): void
	{
		$languages = collect([
			'Bash', 'C', 'C#', 'C++', 'CSS', 'HTML', 'JSON', 'Java', 'JavaScript', 'Lua', 'Objective C', 'Perl',
			'Python', 'Ruby',
			'Swift',
		]);
		$languages->map(function ($item, $key){
			Language::create([
				'title' => $item,
			]);
		});
	}
}

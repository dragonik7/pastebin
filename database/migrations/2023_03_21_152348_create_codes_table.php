<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('codes', function (Blueprint $table)
		{
			$table->uuid('id')->primary();
			$table->longText('text');
			$table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->enum('access', ['public', 'unlisted', 'private'])->default('public');
			$table->dateTime('expiration_time')->nullable();
			$table->foreignId('language_id')->nullable()->constrained('languages')->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('codes');
	}
};
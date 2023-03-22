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
			$table->longText('code');
			$table->foreignId('user_id')->constrained('users')->nullable()->cascadeOnUpdate()->cascadeOnDelete();
			$table->integer('access_id');
			$table->dateTime('expiration_time')->nullable();
			$table->foreignId('language_id')->constrained('languages')->nullable()->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('codes');
	}
};
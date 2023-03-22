<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('reports', function (Blueprint $table)
		{
			$table->id();
			$table->string('title');
			$table->foreignId('user_id')->constrained('users')->nullable();
			$table->foreignUUid('code_id')->constrained('codes')->cascadeOnUpdate()->cascadeOnDelete();
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('reports');
	}
};
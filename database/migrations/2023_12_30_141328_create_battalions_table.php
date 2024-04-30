<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('battalions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('specialty_id')
                ->constrained('battalion_specialties')
                ->cascadeOnDelete();


            $table->string('name')->unique()->index();
            $table->string('police_command');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('battalions');
    }
};

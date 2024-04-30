<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('battalion_polygons', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('battalion_id')
                ->constrained('battalions')
                ->cascadeOnDelete();

            $table->string('company')->index();
            $table->json('coordinates');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('battalion_polygons');
    }
};

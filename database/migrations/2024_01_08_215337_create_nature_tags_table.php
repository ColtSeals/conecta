<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nature_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('nature_id')
                ->constrained('natures')
                ->cascadeOnDelete();

            $table->string('tag')->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nature_tags');
    }
};

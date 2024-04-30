<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_creator_id')
                ->constrained('users');

            $table->foreignUuid('user_publisher_id')
                ->constrained('users');

            $table->foreignUuid('nature_id')
                ->constrained('natures')
                ->cascadeOnDelete();

            $table->string('name')->index();
            $table->timestamps();
            $table->boolean('active')->default(false);
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('trees');
    }
};

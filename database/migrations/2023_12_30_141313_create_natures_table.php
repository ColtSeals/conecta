<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('natures', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 4)->unique()->index();
            $table->string('description');
            $table->timestamps();
            $table->boolean('active')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('natures');
    }
};
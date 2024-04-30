<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_answers', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('question_id')
                ->constrained('questions')
                ->cascadeOnDelete();

            $table->foreignUuid('question_answer_id')->nullable()
                ->constrained('questions')
                ->cascadeOnDelete();

            $table->string('name')->nullable()->index();
            $table->longText('answer')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};

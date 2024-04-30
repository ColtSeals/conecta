<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('occurrence')->index();

            $table->foreignUuid('address_id')
                ->constrained('addresses')
                ->cascadeOnDelete();

            $table->string('requestor')->nullable()->index();
            $table->string('phone')->nullable()->index();
            $table->string('company')->nullable();
            $table->string('observe')->nullable();
            $table->string('finish')->nullable();
            $table->string('redirect')->nullable();
            $table->string('atendent')->nullable();
            $table->string('patrol')->nullable()->index();



            $table->foreignUuid('nature_id')
                ->constrained('natures')
                ->cascadeOnDelete();


            $table->foreignUuid('battalion_id')
                ->constrained('battalions')
                ->cascadeOnDelete();

            $table->integer('reiteration')->nullable();
            $table->text('answers')->nullable();
            $table->text('information')->nullable();
            $table->boolean('possible_hazing');
            $table->boolean('hidden')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('occurrences');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->integer('order')->unique();
            $table->timestamps();
        });

        $roles = [
            'atendent' => 1,
            'dispatcher' => 2,
            'supervision' => 3,
            'manager' => 4,
            'certificates' => 5,
            'technique' => 6,
            'superadmin' => 7
        ];

        foreach ($roles as $roleName => $order) {
            DB::table('roles')->insert([
                'id' => Str::uuid()->toString(),
                'name' => $roleName,
                'order' => $order
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
};

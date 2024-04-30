<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BattalionSeeder::class,
        ]);
    }
}

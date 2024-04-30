<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Battalion;
use App\Models\BattalionSpecialty;
use Illuminate\Database\Seeder;

class BattalionSeeder extends Seeder
{
    public function run(): void
    {
        $specialty = BattalionSpecialty::query()->create(['name' => 'RÁDIO PATRULHA']);


        Battalion::query()->create(['specialty_id' => $specialty->id, 'name' => '01°BPM/M', 'police_command' => 'CPA/M10']);
        Battalion::query()->create(['specialty_id' => $specialty->id, 'name' => '02°BPM/M', 'police_command' => 'CPA/M4']);
    }
}

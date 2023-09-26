<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lab::create([
            'name' => 'IOT'
        ]);
        Lab::create([
            'name' => 'Robotika'
        ]);Lab::create([
            'name' => 'Multimedia'
        ]);
    }
}

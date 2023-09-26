<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lab;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LabSeeder::class);
        $this->call(UserSeeder::class);

        // $this->call([
        //     LabSeeder::class,
        //     UserSeeder::class,
        //     // PostSeeder::class,
        // ]);
    }
}

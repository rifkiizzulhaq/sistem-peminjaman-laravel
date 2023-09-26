<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\User;
use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'Superadmin',
            'email' => 'SuperAdmin@polindra.ac.id',
            'role' => 'SuperAdmin',
            'password' => bcrypt('123456'),
        ]);

        $user = User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'Admin@polindra.ac.id',
            'role' => 'Admin',
            'password' => bcrypt('123456'),
        ]);
        Admin::create([
            'user_id' => $user->id,
            'lab_id' => 1,
            'jabatan' => 'Admin',
        ]);
        $user = User::create([
            'name' => 'mahasiswa',
            'username' => 'mahasiswa',
            'email' => 'mahasiswa@polindra.ac.id',
            'password' => bcrypt(123456),
            'role' => 'mahasiswa'
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => 2105001,
            'jurusan' => 'TI',
            'kelas' => 'D4RPL3A'
        ]);
    }
}

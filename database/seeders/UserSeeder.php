<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
            'level_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'Admin',
            'password' => Hash::make('12345'),
            ],
            [
            'level_id' => 2,
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'username' => 'Dosen',
            'password' => Hash::make('12345'),
            ],
            [
            'level_id' => 3,
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'username' => 'Mahasiswa',
            'password' => Hash::make('12345'),
            ]
            );
    }
}

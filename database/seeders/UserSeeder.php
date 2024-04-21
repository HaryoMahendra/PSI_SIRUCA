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
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345'),
        ],
        [
            'name' => 'Dosen',
            'username' => 'dosen',
            'email' => 'dosen@example.com',
            'password' => Hash::make('12345'),
        ],
        [
            'name' => 'Mahasiswa',
            'username' => '2141760000',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('11111'),
        ]);
    }
}

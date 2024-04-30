<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
            'level_id' => 1, 
            'level_kode' => 'ADM',
            'level_nama' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'level_id' => 2, 
            'level_kode' => 'DSN',
            'level_nama' => 'Dosen',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'level_id' => 3, 
            'level_kode' => 'MHS',
            'level_nama' => 'Mahasiswa',
            'created_at' => now(),
            'updated_at' => now()
        ]
        
    ];
    DB::table('level')->insert($data);          
    }
}

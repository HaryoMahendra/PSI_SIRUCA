<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buku = [
            [
                'kode_buku' => 'B001',
                // 'sampul' => 'buku1.jpg',
                'judul' => 'Belajar PHP',
                'kategori_buku' => 'Pemrograman',
                'penerbit' => 'Informatika',
                'tahun_terbit' => '2021',
                'penulis' => 'Joko',
            ],

        ];

        // Insert data buku ke dalam tabel buku
        DB::table('buku')->insert($buku);
    }
}

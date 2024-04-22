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
                'sampul' => 'buku1.jpg',
                'judul' => 'Belajar Pemrograman Java',
                'kategori_buku' => 'Pemrograman',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2021,
                'penulis' => 'Joko',
            ],
            [
                'kode_buku' => 'B002',
                'sampul' => 'buku2.jpg',
                'judul' => 'Belajar Pemrograman PHP',
                'kategori_buku' => 'Pemrograman',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2021,
                'penulis' => 'Joko',
            ],
            [
                'kode_buku' => 'B003',
                'sampul' => 'buku3.jpg',
                'judul' => 'Belajar Pemrograman Python',
                'kategori_buku' => 'Pemrograman',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2021,
                'penulis' => 'Joko',
            ],
        ];

        // Insert data buku ke dalam tabel buku
        DB::table('buku')->insert($buku);
    }
}

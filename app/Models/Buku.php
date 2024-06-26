<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $primaryKey = 'buku_id';

    protected $table = 'buku';
    
    protected $fillable = [
        'kode_buku',
        'sampul',
        'judul',
        'kategori_buku',
        'penerbit',
        'tahun_terbit',
        'penulis',
    ];
    
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('buku_id');
            $table->string('kode_buku')->unique(); // Kolom kode buku dengan constraint unique
            $table->string('judul');
            $table->string('kategori_buku'); // Kolom kategori buku
            $table->string('penerbit'); // Kolom penerbit
            $table->integer('tahun_terbit');
            $table->string('penulis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};

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
        Schema::create('t_peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->integer('buku_id');
            $table->integer('mahasiswa_id');
            $table->date('tgl_peminjaman');
            $table->date('tgl_kembali');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_peminjaman');
    }
};

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
        Schema::table('t_pengembalian', function (Blueprint $table) {
            $table->id('pengembalian_id');
            $table->date('tgl_pengembalian');
            $table->date('jatuh_tempo');
            $table->integer('buku_id');
            $table->integer('mahasiswa_id');
            $table->integer('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pengembalian');
    }
};

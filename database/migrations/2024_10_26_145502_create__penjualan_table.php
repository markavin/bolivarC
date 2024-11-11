<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->uuid('id_penjualan')->primary();
            $table->dateTime('tanggalPenjualan');
            $table->float('totalHarga');
            $table->float('totalBayar');
            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_pengguna')->references('id')->on('pengguna');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};

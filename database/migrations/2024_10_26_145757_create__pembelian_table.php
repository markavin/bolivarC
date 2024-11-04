<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('id_pembelian', 50)->unique()->primary('id_pembelian');
            $table->dateTime('tanggalPembelian');
            $table->float('totalHarga');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};

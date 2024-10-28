<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('poin', function (Blueprint $table) {
            $table->id();
            $table->integer('TotalPoin');
            $table->enum('status', ['penambahan', 'penukaran']);
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_penukaran')->nullable();
            $table->string('id_penjualan')->nullable();
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_penukaran')->references('id')->on('penukaran');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_poin');
    }
};

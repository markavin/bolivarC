<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penukaran', function (Blueprint $table) {
            $table->id();
            $table->integer('total_penukaranPoin');
            $table->dateTime('tanggal_penukaran');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_menu');
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_menu')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penukaran');
    }
};

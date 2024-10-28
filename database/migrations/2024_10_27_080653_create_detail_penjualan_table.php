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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->id();
            $table->float('harga');
            $table->float('subTotal');
            $table->float('quantity');
            $table->string('id_penjualan');
            $table->unsignedBigInteger('id_menu');
            $table->timestamps();
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan');
            $table->foreign('id_menu')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->float('harga');
            $table->float('subTotal');
            $table->float('quantity');
            $table->string('id_pembelian');
            $table->unsignedBigInteger('id_bahanBaku');
            $table->timestamps();
            $table->foreign('id_pembelian')->references('id_pembelian')->on('pembelian');
            $table->foreign('id_bahanBaku')->references('id')->on('bahanBaku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};

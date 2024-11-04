<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('namaPengguna', 50)->unique();
            $table->string('noHP', 15);
            $table->string('kataSandi');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
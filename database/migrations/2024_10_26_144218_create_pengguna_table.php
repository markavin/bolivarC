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
            $table->string('namaPengguna', 50);
            $table->string('noHP', 15);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_role');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade');
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
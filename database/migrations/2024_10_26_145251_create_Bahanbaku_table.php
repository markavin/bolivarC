<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {  
        Schema::create('bahanBaku', function (Blueprint $table) {
            $table->id();
            $table->string('namaBahanBaku', 25);
            $table->integer('jumlahBahanBaku');
            $table->timestamps();
            $table->softDeletesDatetime('deleted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bahanBaku');
    }
};

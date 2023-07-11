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
        Schema::create('nilaiprestasi', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->integer('id_jenis_prestasi');
            $table->integer('skor');
            $table->float('total');  
            $table->integer('id_usulan');  
            $table->integer('id_jenis_beasiswa');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilaiprestasi');
    }
};

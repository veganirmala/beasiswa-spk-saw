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
            // $table->unsignedBigInteger('nim');
            // $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->float('total');
            $table->unsignedBigInteger('id_usulan');
            $table->foreign('id_usulan')->references('id')->on('tahunusulan');
            $table->unsignedBigInteger('id_jenis_beasiswa');
            $table->foreign('id_jenis_beasiswa')->references('id')->on('jenisbeasiswa');
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

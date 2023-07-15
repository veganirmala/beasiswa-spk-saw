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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('nama');
            $table->string('jk');
            //$table->integer('idprodi');
            $table->unsignedBigInteger('idprodi');
            $table->foreign('idprodi')->references('id')->on('prodi');
            $table->string('email');
            $table->string('notelp');
            $table->string('alamat');
            $table->string('namaayah');
            $table->string('pekerjaanayah');
            $table->integer('penghasilanayah');
            $table->string('namaibu');
            $table->string('pekerjaanibu');
            $table->integer('penghasilanibu');
            $table->integer('tanggungan');
            $table->integer('totalpenghasilan');
            $table->string('namabank');
            $table->string('norek');
            $table->integer('semester');
            //$table->integer('idtahunusulan');
            $table->unsignedBigInteger('idtahunusulan');
            $table->foreign('idtahunusulan')->references('id')->on('tahunusulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};

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
        Schema::create('tahunusulan', function (Blueprint $table) {
            $table->id();
            //$table->string('idjenisbeasiswa');
            $table->unsignedBigInteger('idjenisbeasiswa');
            $table->foreign('idjenisbeasiswa')->references('id')->on('jenisbeasiswa');
            $table->string('tahun');
            $table->string('kuota');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahunusulan');
    }
};

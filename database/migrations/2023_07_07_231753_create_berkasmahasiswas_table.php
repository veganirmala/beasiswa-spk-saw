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
        Schema::create('berkasmahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('dokumenkhs')->nullable();
            $table->string('dokumenpenghasilan')->nullable();
            $table->string('dokumennilaiprestasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkasmahasiswa');
    }
};

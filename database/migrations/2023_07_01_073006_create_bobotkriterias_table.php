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
        Schema::create('bobotkriteria', function (Blueprint $table) {
            $table->id();
            $table->string('idtahunusulan');
            $table->string('idjenisbeasiswa');
            $table->string('bobotkriteriaipk');
            $table->string('bobotkriteriaprestasi');
            $table->string('bobotkriteriapenghasilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobotkriteria');
    }
};

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
        Schema::create('sub_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('riwayat');
            $table->integer('pengalaman');
            $table->integer('keahlian');
            $table->integer('prestasi');
            $table->integer('bobot_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kompetensi');
    }
};

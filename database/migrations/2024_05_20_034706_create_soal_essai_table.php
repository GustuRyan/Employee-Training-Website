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
        Schema::create('soal_essai', function (Blueprint $table) {
            $table->id();
            $table->text('soal')->unique();
            $table->text('jawaban');
            $table->integer('id_modul');
            $table->timestamps();

             // Menambahkan foreign key constraint
             $table->foreign('id_modul')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_essai');
    }
};

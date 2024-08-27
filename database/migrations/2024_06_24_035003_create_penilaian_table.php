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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->integer('modul_id')->nullable();
            $table->integer('option_id')->nullable();
            $table->integer('essai_id')->nullable();
            $table->text('answer')->nullable();
            $table->integer('flag')->nullable();
            $table->integer('scores')->nullable();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('modul_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('soal_option')->onDelete('cascade');
            $table->foreign('essai_id')->references('id')->on('soal_essai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};

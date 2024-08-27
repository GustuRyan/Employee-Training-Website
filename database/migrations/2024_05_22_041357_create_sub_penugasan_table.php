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
        Schema::create('sub_penugasan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('kesesuaian');
            $table->integer('kreativitas');
            $table->integer('inovasi');
            $table->integer('bobot_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_penugasan');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('nama_modul');
            $table->string('judul');
            $table->text('deskripsi');
            $table->integer('id_topik');
            $table->integer('durasi');
            $table->integer('jumlah_option');
            $table->integer('jumlah_esai');
            $table->timestamps();

             // Menambahkan foreign key constraint
             $table->foreign('id_topik')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};

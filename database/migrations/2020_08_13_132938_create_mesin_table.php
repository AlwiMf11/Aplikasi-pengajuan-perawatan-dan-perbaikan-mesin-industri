<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd');
            $table->string('nama');
            $table->string('merk');
            $table->string('kapasitas');
            $table->integer('divisi_id');
            $table->integer('periode_id');
            $table->integer('tahun_id');
            $table->string('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesin');
    }
}

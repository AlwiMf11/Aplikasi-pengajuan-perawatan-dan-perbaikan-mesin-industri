<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd');;
            $table->integer('mesin_id');
            $table->integer('user_id');
            $table->string('judul');
            $table->text('keterangan');
            $table->enum('status',['open','waiting','closed']);
            $table->date('tgl_permintaan');
            $table->enum('type',['perbaikan','perawatan']);
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
        Schema::dropIfExists('permintaan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id_pengeluaran');
            $table->date('tgl_pengeluaran');
            $table->decimal('jumlah', 15, 2);
            $table->unsignedBigInteger('id_sumber');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('id_sumber')->references('id_sumber')->on('sumbers');
        });

    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
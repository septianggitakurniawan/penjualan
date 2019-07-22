<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');
          $table->string('alamat');
          $table->integer('kodeBarang');
          $table->string('namaBarang');
          $table->integer('jumlah');
          $table->string('harga_per_pcs');
          $table->string('kategory');
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
        Schema::dropIfExists('transaksi');
    }
}

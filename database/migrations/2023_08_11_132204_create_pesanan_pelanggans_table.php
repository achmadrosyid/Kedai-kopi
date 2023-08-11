<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('nama');
            $table->string('meja');
            $table->string('diskon');
            $table->integer('jumlah');
            $table->integer('pembayaran');
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
        Schema::dropIfExists('pesanan_pelanggan');
    }
}

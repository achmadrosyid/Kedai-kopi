<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_meja');
            $table->string('nama_pelanggan');
            $table->integer('jumlah_harga');
            $table->integer('diskon');
            $table->integer('total');
            $table->integer('status_dibayar');
            $table->integer('status_pesanan');
            $table->timestamps();
            $table->foreign('id_meja')->references('id')->on('meja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

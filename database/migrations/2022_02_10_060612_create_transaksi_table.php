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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->bigInteger('id_customer_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('kategori_transaksi');
            $table->string('produk_transaksi');
            $table->integer('qty_transaksi');
            $table->integer('total_harga_transaksi');
            $table->string('id_pembayaran');
            $table->string('status_transaksi');
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
};

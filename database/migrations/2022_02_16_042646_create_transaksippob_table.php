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
        Schema::create('transaksippob', function (Blueprint $table) {
            $table->id('id_transaksippob');
            $table->string('customer_ppob');
            $table->string('produk_transaksi_ppob');
            $table->string('harga_transaksi_ppob');
            $table->string('bayar_transaksi_ppob');
            $table->date('tanggal_transaksi_ppob');
            $table->string('nomor_inputan')->nullable();
            $table->string('status_ppob');
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
        Schema::dropIfExists('transaksippob');
    }
};

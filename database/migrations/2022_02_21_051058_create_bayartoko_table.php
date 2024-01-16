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
        Schema::create('bayartoko', function (Blueprint $table) {
            $table->id('id_bayar');
            $table->string('id_kecamatan_bayar');
            $table->string('pengirim_bayar');
            $table->string('toko_bayar');
            $table->date('tanggal_bayar');
            $table->string('nominal_bayar');
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
        Schema::dropIfExists('bayartoko');
    }
};

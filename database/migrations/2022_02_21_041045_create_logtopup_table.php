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
        Schema::create('logtopup', function (Blueprint $table) {
            $table->id('id_topup');
            $table->string('nama_customer_topup');
            $table->string('id_kecamatan_topup');
            $table->string('tanggal_topup');
            $table->string('nominal_topup');
            $table->string('total_saldo_topup');
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
        Schema::dropIfExists('logtopup');
    }
};

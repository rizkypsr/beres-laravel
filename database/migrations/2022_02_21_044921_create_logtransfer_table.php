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
        Schema::create('logtransfer', function (Blueprint $table) {
            $table->id('id_tf');
            $table->string('id_kecamatan_transfer');
            $table->string('pengirim');
            $table->string('penerima');
            $table->date('tanggal');
            $table->string('nominal');
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
        Schema::dropIfExists('logtransfer');
    }
};

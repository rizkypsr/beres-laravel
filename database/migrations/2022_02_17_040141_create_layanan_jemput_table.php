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
        Schema::create('layanan_jemput', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->string('kecamatan_layanan');
            $table->string('nama_layanan');
            $table->string('alamat_layanan');
            $table->string('no_hp_layanan');
            $table->string('jenis_sampah_layanan');
            $table->string('status_layanan');
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
        Schema::dropIfExists('layanan_jemput');
    }
};

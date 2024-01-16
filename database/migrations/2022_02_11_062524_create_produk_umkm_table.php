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
        Schema::create('produk_umkm', function (Blueprint $table) {
            $table->id('id_produk_umkm');
            $table->integer('id_umkm_produk');
            $table->string('nama_produk_umkm');
            $table->string('gambar_produk_umkm');
            $table->string('deskripsi_produk_umkm');
            $table->boolean('produkumkm_is_delete')->default(false);
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
        Schema::dropIfExists('produk_umkm');
    }
};

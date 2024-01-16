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
        Schema::create('produkjualsampah', function (Blueprint $table) {
            $table->id('id_js');
            $table->integer('id_kecamatan');
            $table->string('gambar_js');
            $table->string('judul_js');
            $table->string('deskripsi_js')->nullable();
            $table->integer('harga_js');
            $table->string('satuan_js');
            $table->boolean('js_is_delete')->default(false);
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
        Schema::dropIfExists('produkjualsampah');
    }
};

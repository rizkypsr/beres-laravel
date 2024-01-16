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
        Schema::create('transaksijs', function (Blueprint $table) {
            $table->id('id_transaksijs');
            $table->string('id_cs_js');
            $table->string('id_kc_js');
            $table->string('jenissampah_js');
            $table->string('satuan_js');
            $table->string('jumlah_js');
            $table->string('harga_js');
            $table->string('total_js');
            $table->string('status_js');
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
        Schema::dropIfExists('transaksijs');
    }
};

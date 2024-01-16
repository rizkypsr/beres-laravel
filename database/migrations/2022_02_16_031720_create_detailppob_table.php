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
        Schema::create('detailppob', function (Blueprint $table) {
            $table->id('id_detailppob');
            $table->string('id_ppob_detail');
            $table->string('harga_detailppob');
            $table->string('bayar_detailppob');
            $table->boolean('detailppob_is_delete')->default(false);
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
        Schema::dropIfExists('detailppob');
    }
};

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
        Schema::create('ppob', function (Blueprint $table) {
            $table->id('id_ppob');
            $table->string('gambar_ppob');
            $table->string('judul_ppob');
            $table->boolean('ppob_is_delete')->default(false);
           
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
        Schema::dropIfExists('ppob');
    }
};

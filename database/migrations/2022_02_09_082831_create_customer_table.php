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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('id_kecamatan_customer');
            $table->string('nama_customer');
            $table->string('alamat_customer');
            $table->biginteger('saldo_customer');
            $table->string('pin_customer');
            $table->string('no_hp_customer');
            $table->string('role_customer');
            $table->boolean('customer_is_delete')->default(false);

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
        Schema::dropIfExists('customer');
    }
};

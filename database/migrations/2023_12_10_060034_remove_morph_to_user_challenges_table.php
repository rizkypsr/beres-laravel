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
        Schema::table('user_challenges', function (Blueprint $table) {
            // remove morph to if exists
            // $table->dropMorphs('user');

            // add relation to customer
            $table->foreign('customer_id')->references('id_customer')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_challenges', function (Blueprint $table) {
            // remove relation to customer
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};

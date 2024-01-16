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
        Schema::create('user_challenge_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_challenge_id');
            $table->timestamps();

            $table->foreign('user_challenge_id')->references('id')->on('user_challenges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_challenge_images');
    }
};

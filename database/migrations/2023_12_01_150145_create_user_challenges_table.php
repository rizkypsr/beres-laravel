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
        Schema::create('user_challenges', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('challenge_id');

            $table->string('judul');
            $table->string('subjudul');
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(-1);

            $table->text('submission_data')->nullable();
            $table->timestamps();

            $table->morphs('user');
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_challenges');
    }
};

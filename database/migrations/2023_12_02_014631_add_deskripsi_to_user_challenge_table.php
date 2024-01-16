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
            $table->text('deskripsi')->nullable()->after('subjudul');
            $table->integer('point')->default(0)->after('deskripsi');
            if (Schema::hasColumn('user_challenges', 'submission_data')) {
                $table->dropColumn('submission_data');
            }
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
            $table->dropColumn(['deskripsi', 'point']);
        });
    }
};

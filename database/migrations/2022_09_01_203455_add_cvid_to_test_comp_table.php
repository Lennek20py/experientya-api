<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvidToTestCompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_comp', function (Blueprint $table) {
            $table->foreignId('cv_id')->after('id');
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_comp', function (Blueprint $table) {
            $table->dropForeign('test_comp_cv_id_foreign');
            $table->dropColumn('cv_id');
        });
    }
}

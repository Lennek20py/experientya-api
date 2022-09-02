<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestCompleteIdToAnswersTestCompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers_test_comp', function (Blueprint $table) {
            $table->foreignId('test_complete_id')->after('id');
            $table->foreign('test_complete_id')->references('id')->on('test_comp')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers_test_comp', function (Blueprint $table) {
            $table->dropForeign('answers_test_comp_test_complete_id_foreign');
            $table->dropColumn('test_complete_id');
        });
    }
}

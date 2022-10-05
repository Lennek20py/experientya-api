<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestIdToAnswersTestSoftSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers_test_soft_skills', function (Blueprint $table) {
            $table->foreignId('test_id')->after('id');
            $table->foreign('test_id')->references('id')->on('test_soft_skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers_test_soft_skills', function (Blueprint $table) {
            $table->dropForeign('answers_test_soft_skills_test_id_foreign');
            $table->dropColumn('test_id');
        });
    }
}

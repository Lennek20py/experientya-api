<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAnswersTestSoftSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers_test_soft_skills', function (Blueprint $table) {
            $table->string('fullAnswers')->after('answer_skill');
            $table->string('saved')->after('answer_skill');
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
            $table->dropColumn('fullAnswers');
            $table->dropColumn('saved');
        });
    }
}

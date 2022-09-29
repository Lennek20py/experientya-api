<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTestSoftSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_test_soft_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('question');
            $table->string('soft_skill_tittle');
            $table->string('answer_skill');
            $table->string('answer_date');
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
        Schema::dropIfExists('answers_test_soft_skills');
    }
}

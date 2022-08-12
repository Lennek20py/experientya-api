<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_degree', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('study_level')->nullable();
            $table->string('study_specialty')->nullable();
            $table->string('study_tittle');
            $table->char('study_certificate', 10)->nullable();
            $table->char('study_status', 10);
            $table->string('starting_month');
            $table->string('starting_year');
            $table->string('finished_month')->nullable();
            $table->string('finished_year')->nullable();
            $table->string('study_city')->nullable();
            $table->string('study_state')->nullable();
            $table->string('study_country')->nullable();
            $table->string('file_degree_path', 2048)->nullable();
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
        Schema::dropIfExists('study_degree');
    }
}

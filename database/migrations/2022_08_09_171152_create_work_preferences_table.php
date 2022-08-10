<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_preferences', function (Blueprint $table) {
            $table->id();
            $table->string('desired_job')->nullable();
            $table->string('type_contract');
            $table->boolean('work')->nullable();
            $table->boolean('practices')->nullable();
            $table->boolean('dual_education')->nullable();
            $table->float('desired_salary')->nullable();
            $table->string('hours')->nullable();
            $table->string('avaible_date')->nullable();
            $table->string('preferred_state');
            $table->string('preferred_city');
            $table->string('preferred_country');
            $table->string('specific_profile');
            $table->string('general_profile');
            $table->string('area');
            $table->string('change_city');
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
        Schema::dropIfExists('work_preferences');
    }
}

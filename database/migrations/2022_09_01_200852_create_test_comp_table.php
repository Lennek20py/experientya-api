<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCompTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_comp', function (Blueprint $table) {
            $table->id();
            $table->string("CountDete");
            $table->string("CountInfl");
            $table->string("CountEsta");
            $table->string("CountCump");
            $table->string("test_finished");
            $table->string('finished_date')->nullable();
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
        Schema::dropIfExists('test_comp');
    }
}

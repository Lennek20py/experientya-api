<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_job');
            $table->text('description');
            $table->string('type_job');
            $table->string('type_horary');
            $table->string('type_of_contract');
            $table->text('profile_description');
            $table->date('start_date');
            $table->integer('salary');
            $table->string('payment_type');
            $table->text('offer_address');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->unsignedBigInteger('town_id');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('anuies_area')->onDelete('cascade');

            $table->unsignedBigInteger('general_id');
            $table->foreign('general_id')->references('id')->on('anuies_general')->onDelete('cascade');

            $table->unsignedBigInteger('specific_id');
            $table->foreign('specific_id')->references('id')->on('anuies_specific')->onDelete('cascade');

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
        Schema::dropIfExists('offers');
    }
}

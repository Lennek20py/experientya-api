<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo_path');
            $table->string('company_phone_number');
            $table->text('company_address');
            $table->string('company_postal_code');
            $table->text('company_fiscal_address');
            $table->string('RFC');

            $table->string('responsible_first_name');
            $table->string('responsible_last_name');
            $table->string('responsible_phone_number');
            $table->text('description');

            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->unsignedBigInteger('town_id');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade');

            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

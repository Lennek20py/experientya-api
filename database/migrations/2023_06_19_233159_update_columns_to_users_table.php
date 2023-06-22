<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('CURP')->nullable()->change();
            $table->string('profile_photo_path')->nullable()->change();
            $table->string('banner_photo_path')->nullable()->change();
            $table->text('user_address')->nullable()->change();
            $table->string('user_postal_code')->nullable()->change();
            $table->string('user_phone_number')->nullable()->change();
            $table->string('email_alternative')->nullable()->change();
            $table->string('user_date_of_birth')->nullable()->change();
            $table->foreignId('user_country_id')->nullable()->change();
            $table->foreignId('user_state_id')->nullable()->change();
            $table->foreignId('user_city_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('CURP')->nullable(false)->change();
            $table->string('profile_photo_path')->nullable(false)->change();
            $table->string('banner_photo_path')->nullable(false)->change();
            $table->text('user_address')->nullable(false)->change();
            $table->string('user_postal_code')->nullable(false)->change();
            $table->string('user_phone_number')->nullable(false)->change();
            $table->string('email_alternative')->nullable(false)->change();
            $table->string('user_date_of_birth')->nullable(false)->change();
            $table->foreignId('user_country_id')->nullable(false)->change();
            $table->foreignId('user_state_id')->nullable(false)->change();
            $table->foreignId('user_city_id')->nullable(false)->change();
        });
    }
}

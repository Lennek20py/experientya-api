<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatesTownsCountriesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('user_country_id');
            $table->foreign('user_country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->foreignId('user_state_id');
            $table->foreign('user_state_id')->references('id')->on('states')->onDelete('cascade');

            $table->foreignId('user_city_id');
            $table->foreign('user_city_id')->references('id')->on('towns')->onDelete('cascade');
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
            
            $table->dropForeign('users_user_country_id_foreign');
            $table->dropColumn('user_country_id');
            $table->dropForeign('users_user_state_id_foreign');
            $table->dropColumn('user_state_id');
            $table->dropForeign('users_user_city_id_foreign');
            $table->dropColumn('user_city_id');
        });
    }
}

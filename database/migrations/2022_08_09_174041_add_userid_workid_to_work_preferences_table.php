<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridWorkidToWorkPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_preferences', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->foreignId('work_id');
            // $table->foreign('work_id')->references('id')->on('work_clasification')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_preferences', function (Blueprint $table) {
            $table->dropForeign('work_preferences_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}

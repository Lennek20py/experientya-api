<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvidToCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->foreignId('cv_id')->after('id');
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certifications', function (Blueprint $table) {
            $table->dropForeign('certifications_cv_id_foreign');
            $table->dropColumn('cv_id');
        });
    }
}

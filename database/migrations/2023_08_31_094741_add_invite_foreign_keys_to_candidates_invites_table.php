<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInviteForeignKeysToCandidatesInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates_invites', function (Blueprint $table) {
            $table->foreignId('cv_id')->after('id');
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
            $table->foreignId('offer_id')->after('cv_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->foreignId('company_id')->after('offer_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates_invites', function (Blueprint $table) {
            $table->dropForeign('candidates_invites_cv_id_foreign');
            $table->dropForeign('candidates_invites_offer_id_foreign');
            $table->dropForeign('candidates_invites_company_id_foreign');
            $table->dropColumn('cv_id');
            $table->dropColumn('offer_id');
            $table->dropColumn('company_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvIdAndOfferIdToAppliedOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applied_offers', function (Blueprint $table) {
            $table->foreignId('cv_id')->after('id');
            $table->foreign('cv_id')->references('id')->on('cv')->onDelete('cascade');
            $table->foreignId('offer_id')->after('cv_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applied_offers', function (Blueprint $table) {
            $table->dropForeign('applied_offers_cv_id_foreign');
            $table->dropForeign('applied_offers_offer_id_foreign');
            $table->dropColumn('cv_id');
            $table->dropColumn('offer_id');
        });
    }
}

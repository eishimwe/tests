<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDonationStatusOnDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->integer('donation_status_id');
            $table->foreign('donation_status_id')->references('id')->on('donations_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            
            $table->dropForeign('donation_status_id');
            $table->dropColumn('donation_status_id');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDonationsStatusToDonationsAllocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations_allocation', function (Blueprint $table) {
            $table->integer('donation_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations_allocation', function (Blueprint $table) {
            $table->dropColumn('donation_status');
        });
    }
}

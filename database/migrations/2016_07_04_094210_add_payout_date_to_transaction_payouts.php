<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPayoutDateToTransactionPayouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions_payouts', function (Blueprint $table) {
            
            $table->datetime('payout_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions_payouts', function (Blueprint $table) {
            
            $table->dropColumn('payout_date');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donor_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->foreign('donor_id')->references('id')->on('users');
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->integer('donation_amount');
            $table->integer('created_by')->default(-1);
            $table->integer('updated_by')->default(-1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donations_allocation');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations_statuses', function (Blueprint $table) {
            $table->integer('id');
            $table->string('description', 50);
            $table->integer('created_by')->default(-1);
            $table->integer('updated_by')->default(-1);
            $table->primary('id');
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
        Schema::drop('donations_statuses');
    }
}

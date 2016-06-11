<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('users', function ($table) {
            $table->integer('user_registration_statuses_id');
            $table->foreign('user_registration_statuses_id')->references('id')->on('user_registration_statuses');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function ($table) {
            $table->dropForeign('user_registration_statuses_id');
            $table->dropColumn('user_registration_statuses_id');
        });
    }
}

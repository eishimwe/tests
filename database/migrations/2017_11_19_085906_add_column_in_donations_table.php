<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInDonationsTable extends Migration
{

    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->integer('month');

        });
    }


    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {

            $table->dropColumn('month');
        });
    }
}

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
        Schema::create('user_registration_statuses', function (Blueprint $table) {
            $table->integer('id')->unique;
            $table->string('description');
            $table->integer('created_by')->default(-1);
            $table->integer('updated_by')->default(-1);           
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_registration_statuses');
        
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sponsor_user_id');
            $table->integer('sponsor_type_id');
            $table->integer('sponsored_user_id');
            $table->string('amount_due');
            $table->integer('paid')->default(0);
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
        Schema::drop('users_registrations');
    }
}

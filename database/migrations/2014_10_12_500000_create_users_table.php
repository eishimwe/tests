<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique;
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('id_number');
            $table->string('password');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

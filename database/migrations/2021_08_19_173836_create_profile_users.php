<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('province');
            $table->integer('user_id')->unsigned(); //to accept the connection with the user table
            $table->string('gender');
            $table->longText('facebook');
            $table->timestamps();
            //relate to another column its name is id, this column in users table,
            //then delete user with profile as well
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_users');
    }
}

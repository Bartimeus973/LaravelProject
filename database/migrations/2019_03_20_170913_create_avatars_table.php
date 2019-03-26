<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create the avatars table schema
        Schema::create('avatars', function (Blueprint $table) {
            $table->bigIncrements('id');//Avatar id
            $table->string('email');
            $table->char('picture', 100);//Char table to stock url image
            $table->timestamps();
            $table->unsignedBigInteger('users_id');//User id link to a avatar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avatars');
    }
}

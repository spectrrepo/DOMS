<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
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
            $table->string('name');
            $table->string('sex')->nullable();
            $table->string('password');
            $table->string('skype')->nullable();
            $table->string('email');
            $table->string('about');
            $table->string('phone');
            $table->string('type');
            $table->string('photo')->nullable();
            $table->string('vk_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->timestamp('create_at')->nullable();;
            $table->timestamp('update_at')->nullable();;
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Users');
    }
}

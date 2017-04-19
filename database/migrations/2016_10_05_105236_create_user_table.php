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
            $table->string('email');
            $table->string('password');
            $table->enum('sex',['man','woman'])->default('man');
            $table->string('skype')->nullable();
            $table->longText('about')->nullable();
            $table->string('phone')->nullable();
            $table->enum('type',['shop', 'designer', 'user', 'master'])->default('user');
            $table->string('photo')->nullable();
            $table->string('vk_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->timestamp('update_at')->nullable();
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

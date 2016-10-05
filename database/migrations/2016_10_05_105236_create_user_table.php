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

        Schema::create('Users', function (Blueprint $table)){
            $table->increments('id');
            $table->string('name');
            $table->string('sex');
            $table->integer('phone');
            $table->string('status');
            $table->string('e-mail');
            $table->string('password');
            $table->string('skype');
            $table->string('soc_net');
            $table->string('portret');
        }
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

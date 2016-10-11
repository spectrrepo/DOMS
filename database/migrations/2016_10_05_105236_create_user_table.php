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

        Schema::create('Users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sex')->nullable();
            $table->integer('phone')->nullable()->unsigned();
            $table->string('e_mail');
            $table->string('status');
            $table->string('password');
            $table->string('skype')->nullable();
            $table->string('soc_net')->nullable();
            $table->string('portret')->nullable();
            $table->timestamp('date_reg')->nullable();;
            $table->timestamp('date_update')->nullable();;
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

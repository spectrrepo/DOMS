<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserSocial extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('user_socials', function(Blueprint $table) {
            $table->integer('user')->nullable();
            $table->string('link')->nullable();
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::create('user_socials', function(Blueprint $table) {
            $table->dropColumn('user');
            $table->dropColumn('link');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLiked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Likeds', function(Blueprint $table) {

            $table->increments('id');
            $table->string('post_id');
            $table->string('user_id');
            $table->timestamp('update_to')->nullable();
            $table->timestamp('create_to')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Likeds');
    }
}

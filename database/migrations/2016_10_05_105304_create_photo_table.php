<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Images', function (Blueprint $table)){
            $table->increments('id');
            $table->('title');
            $table->('description');
            $table->('path_full');
            $table->('path_min');
            $table->('author_id');
            $table->('user_upload_id');
            $table->('colors');
            $table->('variants');
            $table->('style');
            $table->('rooms');
            $table->('update_to');
            $table->('create_to');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Images');
    }
}

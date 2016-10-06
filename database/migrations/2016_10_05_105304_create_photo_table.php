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
        Schema::create('Images', function (Blueprint $table){
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('path_full');
            $table->string('path_min');
            $table->integer('author_id')->nullable()->unsigned();
            $table->integer('user_upload_id')->unsigned();
            $table->string('colors')->nullable();
            $table->string('variants')->nullable();
            $table->string('style')->nullable();
            $table->string('rooms')->nullable();
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
        Schema::drop('Images');
    }
}

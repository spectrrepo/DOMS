<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->('title');
            $table->('seo_title');
            $table->('description');
            $table->('description_full');
            $table->('image_text');
            $table->('image');
            $table->('video');
            $table->('user_add');
            $table->('status');
            $table->('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}

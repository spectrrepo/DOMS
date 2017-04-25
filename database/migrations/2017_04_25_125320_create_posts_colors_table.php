<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_colors', function (Blueprint $table) {
            $table->integer('post_id')
                  ->unsigned();
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');
                      
            $table->integer('color_id')
                  ->unsigned();
            $table->foreign('color_id')
                  ->references('id')
                  ->on('colors');

            $table->primary(['post_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_colors');
    }
}

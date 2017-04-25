<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_styles', function (Blueprint $table) {
            $table->integer('post_id')
                  ->unsigned();
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');

            $table->integer('style_id')
                  ->unsigned();
            $table->foreign('style_id')
                  ->references('id')
                  ->on('styles');
                      
            $table->primary(['post_id', 'style_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_styles');
    }
}

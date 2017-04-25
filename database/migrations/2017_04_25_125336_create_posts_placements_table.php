<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsPlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_placements', function (Blueprint $table) {
            $table->integer('post_id')
                  ->unsigned();
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');
            $table->integer('placement_id')
                  ->unsigned();
            $table->foreign('placement_id')
                  ->references('id')
                  ->on('placements');
            $table->primary(['post_id', 'placement_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_placements');
    }
}

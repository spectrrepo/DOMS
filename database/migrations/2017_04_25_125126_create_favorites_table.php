<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->integer('post_id')
                  ->unsigned();
            $table->integer('user_id')
                  ->unsigned();
            $table->foreign('post_id')
                  ->references('id')
                  ->on('posts');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->primary(['post_id', 'user_id']);
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('favorites');
    }
}

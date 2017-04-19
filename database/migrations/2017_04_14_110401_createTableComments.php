<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function ( Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('comment');
            $table->integer('image_id');
            $table->boolean('status')->default(false);
            $table->integer('blocked_user');
            $table->timestamp('date');
            $table->string('rus_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}

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
            $table->('id');
            $table->('user_id');
            $table->('comment');
            $table->('image_id');
            $table->('status');
            $table->('blocked_user');
            $table->('date');
            $table->('rus_date');
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

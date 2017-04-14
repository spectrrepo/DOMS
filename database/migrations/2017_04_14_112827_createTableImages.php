<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function ( Blueprint $table) {
            $table->('id');
            $table->('title');
            $table->('description');
            $table->('photo');
            $table->('min_photo');
            $table->('quadro_photo');
            $table->('author_id');
            $table->('blocked');
            $table->('update_to');
            $table->('create_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}

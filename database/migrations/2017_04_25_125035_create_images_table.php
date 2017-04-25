<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')
                  ->nullable();
            $table->longText('description')
                  ->nullable();
            $table->string('photo');
            $table->string('min_photo');
            $table->string('quadro_photo');
            $table->integer('author_id')
                  ->unsigned();
            $table->foreign('author_id')
                  ->references('id')
                  ->on('users');
            $table->integer('views');
            $table->boolean('status')
                  ->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}

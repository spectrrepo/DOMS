<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News', function (Blueprint $table){
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->text('full_description')->nullable();
                $table->string('news_file_name')->nullable();
                $table->integer('news_file_size')->nullable();
                $table->string('news_content_type')->nullable();
                $table->timestamp('news_updated_at')->nullable();
                $table->string('file_path_full')->nullable();
                $table->string('file_path_min')->nullable();
                $table->timestamp('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('News');
    }
}

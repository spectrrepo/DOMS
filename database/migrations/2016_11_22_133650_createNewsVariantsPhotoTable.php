<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsVariantsPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News_variant_photo', function (Blueprint $table){
                $table->increments('id');
                $table->string('news_variant_file_name')->nullable();
                $table->integer('news_variant_file_size')->nullable();
                $table->string('news_variant_content_type')->nullable();
                $table->timestamp('news_variant_updated_at')->nullable();
                $table->string('file_path_full')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('News_variant_photo');
    }
}

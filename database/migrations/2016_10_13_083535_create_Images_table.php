<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPhotoFieldsToImagesTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Images', function(Blueprint $table) {

            $table->increments('id');
            $table->string('photo_file_name')->nullable();
            $table->integer('photo_file_size')->nullable();
            $table->string('photo_content_type')->nullable();
            $table->timestamp('photo_updated_at')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('author_id')->nullable()->unsigned();
            $table->integer('user_upload_id')->unsigned();
            $table->string('colors')->nullable();
            $table->string('variants')->nullable();
            $table->string('style')->nullable();
            $table->string('rooms')->nullable();
            $table->timestamp('update_to')->nullable();
            $table->timestamp('create_to')->nullable();
        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('Images');
    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_tags', function (Blueprint $table) {
            $table->integer('img_id')->unsigned();
            $table->foreign('img_id')
                ->references('id')
                ->on('Images')
                ->onDelete('cascade');

            $table->integer('tags_id')->unsigned();
            $table->foreign('tags_id')
                ->references('id')
                ->on('Tags')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('img_tags');
    }
}

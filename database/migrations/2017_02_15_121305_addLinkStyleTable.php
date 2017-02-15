<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_styles', function (Blueprint $table) {
            $table->integer('img_id')->unsigned();
            $table->foreign('img_id')
                ->references('id')
                ->on('Images')
                ->onDelete('cascade');

            $table->integer('style_id')->unsigned();
            $table->foreign('style_id')
                ->references('id')
                ->on('Styles')
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
        Schema::drop('img_styles');
    }
}

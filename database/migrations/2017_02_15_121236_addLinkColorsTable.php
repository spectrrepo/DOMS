<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_colors', function (Blueprint $table) {
            $table->integer('img_id')->unsigned();
            $table->foreign('img_id')
                ->references('id')
                ->on('Images')
                ->onDelete('cascade');

            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')
                ->references('id')
                ->on('Colors')
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
        Schema::drop('img_colors');
    }
}

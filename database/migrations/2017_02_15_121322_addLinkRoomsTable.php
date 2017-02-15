<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_rooms', function (Blueprint $table) {
            $table->integer('img_id')->unsigned();
            $table->foreign('img_id')
                ->references('id')
                ->on('Images')
                ->onDelete('cascade');

            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')
                ->references('id')
                ->on('Rooms')
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
        Schema::drop('img_rooms');
    }
}

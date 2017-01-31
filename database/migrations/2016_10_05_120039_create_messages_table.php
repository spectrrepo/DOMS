<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Messages', function (Blueprint $table){
                $table->increments('id');
                $table->integer('sender_id')->unsigned();
                $table->integer('recepient_id')->unsigned();
                $table->text('text');
                $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Messages');
    }
}

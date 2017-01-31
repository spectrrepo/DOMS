<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableMessageMail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Message_mail', function (Blueprint $table){
              $table->increments('id');
              $table->string('name')->nullable();
              $table->string('e_mail')->nullable();
              $table->text('text_message')->nullable();
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
        Schema::drop('Message_mail');
    }
}

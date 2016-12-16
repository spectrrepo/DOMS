<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCopyright extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('copyright', function (Blueprint $table){
              $table->increments('id');
              $table->string('photo')->nullable();
              $table->string('post_id')->nullable();
              $table->string('user_pretense_id')->nullable();
              $table->string('user_author_id')->nullable();
              $table->text('message')->nullable();
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
        Schema::drop('copyright');
    }
}

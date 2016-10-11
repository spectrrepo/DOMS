<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Views', function (Blueprint $table){
                $table->increments('id');
                $table->string('path_min');
                $table->string('path_full');
                $table->string('alt_text');
                $table->integer('post_id')->unsigned();
                $table->integer('user_id')->unsigned();
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
        Schema::drop('Views');
    }
}

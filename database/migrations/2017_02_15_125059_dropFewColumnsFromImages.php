<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFewColumnsFromImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Images', function (Blueprint $table){
            $table->dropColumn('likes_count');
            $table->dropColumn('comments_count');
            $table->dropColumn('favs_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Images', function (Blueprint $table){
            $table->integer('likes_count')->unsigned();
            $table->integer('comments_count')->unsigned();
            $table->integer('favs_count')->unsigned();
        });
    }
}

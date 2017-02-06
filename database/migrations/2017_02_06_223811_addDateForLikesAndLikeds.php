<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateForLikesAndLikeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Likes', function (Blueprint $table){
          $table->string('date_rus')->nullable();
      });

      Schema::table('Likeds', function (Blueprint $table){
          $table->string('date_rus')->nullable();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('Likes', function (Blueprint $table){
          $table->dropColumn('date_rus');
      });

      Schema::table('Likeds', function (Blueprint $table){
          $table->dropColumn('date_rus');
      });
    }
}

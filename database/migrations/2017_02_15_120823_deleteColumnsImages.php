<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Images', function (Blueprint $table){
            $table->dropColumn('userPhoto');
            $table->dropColumn('userName');
            $table->dropColumn('colors');
            $table->dropColumn('variants');
            $table->dropColumn('style');
            $table->dropColumn('rooms');
            $table->dropColumn('tags');
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

        });
    }
}

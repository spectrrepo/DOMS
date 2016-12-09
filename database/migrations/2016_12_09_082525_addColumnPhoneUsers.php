<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPhoneUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('Users', function(Blueprint $table) {
               $table->bigInteger('phone')->nullable()->unsigned();
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('Users', function(Blueprint $table) {
                $table->dropColumn('phone');
        });

    }
}

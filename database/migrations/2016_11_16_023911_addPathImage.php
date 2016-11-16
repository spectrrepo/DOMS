<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPathImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Images', function(Blueprint $table) {

            $table->string('full_path')->nullable();
            $table->string('min_path')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('Images', function(Blueprint $table) {

            $table->dropColumn('full_path');
            $table->dropColumn('min_path');

        });
    }
}

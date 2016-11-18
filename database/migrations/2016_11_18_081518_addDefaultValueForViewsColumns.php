<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueForViewsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Views', function(Blueprint $table) {

            $table->string('path_min')->nullable();
            $table->string('path_full')->nullable();


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Views', function(Blueprint $table) {

            $table->dropColumn('path_min');
            $table->dropColumn('path_full');

        });
    }
}

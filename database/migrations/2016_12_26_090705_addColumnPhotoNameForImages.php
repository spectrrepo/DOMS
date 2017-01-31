<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPhotoNameForImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Images', function(Blueprint $table) {
            $table->string('userPhoto')->nullable();
            $table->string('userName')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Images', function(Blueprint $table) {
            $table->dropColumn('userPhoto');
            $table->dropColumn('userName');
        });
    }
}

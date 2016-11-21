<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('Images', function(Blueprint $table) {
          $table->timestamp('update_to')->nullable();
          $table->timestamp('create_to')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { Schema::table('Images', function(Blueprint $table) {

          $table->dropColumn('update_to');
          $table->dropColumn('create_to');

      });
    }
}

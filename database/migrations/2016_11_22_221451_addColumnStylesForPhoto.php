<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStylesForPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Styles', function(Blueprint $table) {

          $table->string('photo_file_name')->nullable();
          $table->integer('photo_file_size')->nullable()->after('photo_file_name');
          $table->string('photo_content_type')->nullable()->after('photo_file_size');
          $table->timestamp('photo_updated_at')->nullable()->after('photo_content_type');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('Styles', function(Blueprint $table) {

          $table->dropColumn('photo_file_name');
          $table->dropColumn('photo_file_size');
          $table->dropColumn('photo_content_type');
          $table->dropColumn('photo_updated_at');

      });
    }
}

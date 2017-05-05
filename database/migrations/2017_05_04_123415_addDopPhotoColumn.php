<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDopPhotoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->string('img_mini');
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');

        });

        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->string('img');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('min_photo');
            $table->dropColumn('quadro_photo');
            $table->string('img_mini');
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');
        });

        Schema::table('views', function (Blueprint $table) {
            $table->dropColumn('min_photo');
            $table->dropColumn('photo');
            $table->string('img_mini');
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');
        });

        Schema::table('placements', function (Blueprint $table) {
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');

            $table->string('description');
            $table->string('full_description');
        });

        Schema::table('styles', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->string('img_middle');
            $table->string('img_large');
            $table->string('img_square');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//todo:sdfas
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['img_middle','img_large', 'img_square']);
        });

        Schema::table('slides', function (Blueprint $table) {
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['img_large', 'img_square']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('img_square');
        });

        Schema::table('views', function (Blueprint $table) {
            $table->dropColumn(['img_large','img_square']);
        });

        Schema::table('placements', function (Blueprint $table) {
            $table->dropColumn(['img_middle', 'img_large','img_square', 'description', 'full_description']);
        });

        Schema::table('styles', function (Blueprint $table) {
            $table->dropColumn(['img_large','img_square']);
        });
    }
}

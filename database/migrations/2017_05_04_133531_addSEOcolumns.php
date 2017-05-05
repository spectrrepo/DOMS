<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSEOcolumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('alt')->nullable();
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->string('alt')->nullable();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->string('alt')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->string('alt')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('alt')->nullable();
        });

        Schema::table('views', function (Blueprint $table) {
            $table->string('alt')->nullable();
        });

        Schema::table('placements', function (Blueprint $table) {
            $table->string('alt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords', 'alt']);
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('alt');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['seo_description', 'seo_keywords', 'alt']);
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('alt');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords', 'alt']);
        });

        Schema::table('views', function (Blueprint $table) {
            $table->dropColumn('alt');
        });

        Schema::table('placements', function (Blueprint $table) {
            $table->dropColumn('alt');
        });

    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserSocialAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_account', function ( Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updates_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_social_account');
    }
}

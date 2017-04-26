<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->integer('user_id')
                  ->unsigned()
                  ->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->integer('role_id')
                  ->unsigned()
                  ->nullable();
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles');

            $table->primary(['user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_roles');
    }
}
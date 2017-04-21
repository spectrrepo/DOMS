<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersRoles extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users_roles', function (Blueprint $table) {
				$table->integer('user_id')
				->nullable();
				$table->foreign('user_id')
				->references('id')
					->on('users');

				$table->integer('role_id')
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
	public function down() {
		Schema::drop('users_roles');
	}
}

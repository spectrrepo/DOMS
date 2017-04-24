<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersSocials extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users_socials', function (Blueprint $table) {
				$table->integer('user_id');
				$table->string('link');
				$table->foreign('user_id')
				      ->references('id')
					  ->on('users');
				$table->primary('user_id');
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users_socials');
	}
}

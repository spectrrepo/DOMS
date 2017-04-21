<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserSocialAccount extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_social_account', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->string('provider_user_id');
				$table->string('provider');
				$table->timestamp();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_social_account');
	}
}

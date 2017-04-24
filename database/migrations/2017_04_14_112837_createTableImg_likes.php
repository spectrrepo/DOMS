<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgLikes extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_likes', function (Blueprint $table) {
				$table->integer('img_id');
				$table->integer('user_id');
				$table->foreign('user_id')
				      ->references('id')
					  ->on('roles');
				$table->foreign('img_id')
				      ->references('id')
					  ->on('roles');

				$table->primary(['img_id', 'user_id']);
				$table->timestamp('date');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('img_likes');
	}
}

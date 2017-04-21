<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgFavorites extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_favorite', function (Blueprint $table) {
				$table->integer('img_id');
				$table->integer('user_id');
				$table->foreign('img_id')
				->references('id')
					->on('images');

				$table->foreign('user_id')
				->references('id')
					->on('users');

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
		Schema::drop('img_favorite');
	}
}

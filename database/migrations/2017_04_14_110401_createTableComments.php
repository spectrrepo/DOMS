<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComments extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('comments', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->text('comment');
				$table->integer('image_id');
				$table->boolean('status')
				      ->default(false);
				$table->integer('blocked_user');
				$table->timestamp('date');
				$table->foreign('user_id')
				      ->references('id')
					  ->on('users');
				$table->foreign('image_id')
				      ->references('id')
					  ->on('images');
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('comments');
	}
}

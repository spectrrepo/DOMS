<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArticles extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('articles', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->text('description');
				$table->longText('description_full');
				$table->string('seo_title')
				      ->nullable();
				$table->text('image_text');
				$table->string('image');
				$table->string('video')
				      ->nullable();
				$table->integer('user_add');
				$table->foreign('user_add')
				      ->references('id')
					  ->on('users');
				$table->boolean('status')
				      ->default(false);
				$table->timestamp('date');
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('articles');
	}
}

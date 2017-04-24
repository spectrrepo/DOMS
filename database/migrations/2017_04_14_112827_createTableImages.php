<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImages extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('images', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title')
					  ->nullable();
				$table->longText('description')
				      ->nullable();
				$table->string('photo');
				$table->string('min_photo');
				$table->string('quadro_photo');
				$table->integer('author_id')
				      ->nullable();
				$table->foreign('author_id')
				      ->references('id')
					  ->on('users');
				$table->boolean('blocked')
				      ->default(false);
				$table->timestamp();
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('images');
	}
}

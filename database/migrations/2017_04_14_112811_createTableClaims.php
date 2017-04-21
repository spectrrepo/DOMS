<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClaims extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('claims', function (Blueprint $table) {
				$table->increments('id');
				$table->text('text');
				$table->string('file');
				$table->integer('user_id');
				$table->integer('author_id')
				->nullable();
				$table->boolean('status')
				->default(false);
				$table->integer('image_id');
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
		Schema::drop('claims');
	}
}

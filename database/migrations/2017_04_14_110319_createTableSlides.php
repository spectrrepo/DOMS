<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSlides extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('slides', function (Blueprint $table) {
				$table->increments('id');
				$table->text('text');
				$table->string('photo');
				$table->integer('user_add');
				$table->foreign('user_add')
					  ->references('id')
					  ->on('users');
				$table->timestamp('date');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('slides');
	}
}

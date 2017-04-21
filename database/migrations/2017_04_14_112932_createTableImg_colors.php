<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgColors extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_colors', function (Blueprint $table) {
				$table->integer('img_id');
				$table->foreign('img_id')
				->references('id')
					->on('images');
				$table->integer('color_id');
				$table->foreign('color_id')
				->references('id')
					->on('colors');
				$table->primary(['img_id', 'color_id']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('img_colors');
	}
}

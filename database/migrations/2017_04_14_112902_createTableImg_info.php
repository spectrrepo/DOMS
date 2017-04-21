<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgInfo extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_info', function (Blueprint $table) {
				$table->integer('img_id');
				$table->foreign('img_id')
				->references('id')
					->on('roles');
				$table->primary('img_id');
				$table->integer('views');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('img_info');
	}
}

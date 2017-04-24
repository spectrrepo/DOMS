<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgStyles extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_styles', function (Blueprint $table) {
				$table->integer('img_id');
				$table->foreign('img_id')
				      ->references('id')
					  ->on('images');

				$table->integer('style_id');
				$table->foreign('style_id')
				      ->references('id')
					  ->on('styles');
					  
				$table->primary(['img_id', 'style_id']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('img_styles');
	}
}

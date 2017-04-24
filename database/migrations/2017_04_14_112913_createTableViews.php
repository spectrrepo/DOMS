<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableViews extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('views', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('img_id');
				$table->foreign('img_id')
				      ->references('id')
					  ->on('images');
				$table->string('photo');
				$table->string('min_photo');
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
		Schema::drop('views');
	}
}

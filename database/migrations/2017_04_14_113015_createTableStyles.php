<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStyles extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('styles', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->boolean('status')
				->default(false);
				$table->string('image');
				$table->text('description');
				$table->longText('full_description');
				$table->string('alt');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('styles');
	}
}

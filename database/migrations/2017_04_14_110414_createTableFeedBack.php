<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFeedBack extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('feedbacks', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('email');
				$table->text('message');
				$table->longText('answer')
				      ->nullable();
				$table->timestamp('date_ask');
				$table->timestamp('date_answer')
				      ->nullable();
				$table->integer('user_answer')
				      ->nullable();
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('feedback');
	}
}

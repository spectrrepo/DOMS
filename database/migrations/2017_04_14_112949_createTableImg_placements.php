<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgPlacements extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('img_placements', function (Blueprint $table) {
				$table->integer('img_id');
				$table->foreign('img_id')
				      ->references('id')
					  ->on('images');
				$table->integer('placement_id');
				$table->foreign('placement_id')
				      ->references('id')
					  ->on('placements');
				$table->primary(['img_id', 'placement_id']);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('img_placements');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('payouts', function(Blueprint $table) {
            $table->enum('content_type', ['image', 'short_text', 'list', 'article']);
            $table->integer('base');
            $table->integer('per_view');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('payouts');
	}

}

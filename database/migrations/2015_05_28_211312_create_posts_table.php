<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->enum('status', ['pending_post', 'rejected', 'posted']);
			$table->string('admin_message', 300)->nullable();
			$table->string('title', 255);
			$table->string('slug', 35)->unique();
			$table->enum('content_type', ['image', 'short_text', 'list', 'article']);
			$table->string('content', 2000);
			$table->dateTime('posted_at')->nullable(); //when it was approved
			$table->dateTime('cashedout_at')->nullable(); //when the views_since_payment was reset to 0
			$table->integer('total_views')->unsigned();
			$table->integer('views_since_payment')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}

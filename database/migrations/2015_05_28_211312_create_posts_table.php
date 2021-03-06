<?php

use App\Post;

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

			$table->enum('status', ['pending_post', 'saved', 'rejected', 'posted']);
			$table->string('admin_message', 300)->nullable();
			$table->string('title', 200);
            $table->enum('category', Post::$categories);

            $table->string('summary', 1000);
            $table->string('thumbnail_image', 200);

            $table->string('slug', 35)->unique();
			$table->integer('views')->unsigned();
            $table->timestamp('posted_at')->nullable();
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

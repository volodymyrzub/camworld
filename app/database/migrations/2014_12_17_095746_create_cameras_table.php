<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamerasTable extends Migration {

	public function up()
	{
		Schema::create('cameras', function($table)
		{
			$table->increments('id');
			$table->string('meta_title', 120);
			$table->string('meta_keywords', 120);
			$table->string('meta_description', 120);
			$table->string('meta_h1', 120);
			$table->string('name', 100);
			$table->string('image', 100);
			$table->text('video_link');
			$table->text('description');
			$table->integer('category_id')->unsigned();
			$table->integer('time_zone');
			$table->integer('rating');
			$table->boolean('enabled');
			$table->timestamps();
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	public function down()
	{
		Schema::drop('cameras');
	}

}

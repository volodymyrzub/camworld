<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('camera_id')->unsigned();
			$table->text('body');
			$table->timestamp('date');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('camera_id')->references('id')->on('cameras');

		});
	}

	public function down()
	{
		Schema::drop('comments');
	}

}

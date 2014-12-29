<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function($table){
			$table->increments('id');
			$table->string('image', 300);
			$table->integer('camera_id')->unsigned();
			$table->timestamps();
			$table->foreign('camera_id')->references('id')->on('cameras');
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}

}

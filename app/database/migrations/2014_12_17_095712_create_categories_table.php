<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function($table){
			$table->increments('id');
			$table->string('name', 100);
			$table->string('image', 255);
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}

}

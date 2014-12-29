<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->text('password');
			$table->text('remember_token', 300);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}

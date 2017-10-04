<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 30);
			$table->string('last_name', 30);
			$table->string('street', 30);
			$table->string('house_nr', 10);
			$table->string('city', 30);
			$table->string('country', 30);
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('salt', 30);
			$table->string('paypal', 100);
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
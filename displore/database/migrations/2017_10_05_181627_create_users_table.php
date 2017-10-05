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
			$table->string('street', 30)->nullable();
			$table->string('house_nr', 10)->nullable();;
			$table->string('city', 30)->nullable();;
			$table->string('country', 30)->nullable();;
			$table->string('email', 100);
			$table->string('password', 100);
			$table->string('paypal', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
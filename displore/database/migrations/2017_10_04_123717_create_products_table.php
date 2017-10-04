<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title', 30);
			$table->text('description');
			$table->double('price');
			$table->string('price_time', 30);
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
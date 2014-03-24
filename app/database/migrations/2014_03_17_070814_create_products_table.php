<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->text('description');
			$table->decimal('price', 5, 2);
			$table->decimal('discounted_price', 5, 2)->default(null);
			$table->string('color');
			$table->string('size');
			$table->enum('type', array('physical', 'digital'))->default('physical');
			$table->enum('parent', array('0', '1'))->default(0);
			$table->enum('status', array('0', '1'))->default(1);
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
		Schema::drop('products');
	}

}

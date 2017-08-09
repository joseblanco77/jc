<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('purchase_id')->unsigned()->index();
			$table->integer('product_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->decimal('price',10,2);
			$table->integer('quantity');
			$table->timestamps();

			$table->foreign('purchase_id')->references('id')->on('purchases');
			$table->foreign('product_id')->references('id')->on('products');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('details');
	}

}

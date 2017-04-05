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
			$table->integer('purchase_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->decimal('price',10,4);
			$table->integer('quantity');
			$table->timestamps();

			$table->foreign('purchase_id')->references('id')->on('purchases');
			$table->foreign('product_id')->references('id')->on('products');
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

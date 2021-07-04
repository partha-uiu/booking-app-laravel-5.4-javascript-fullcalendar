<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table) {
			$table->increments('id');
			$table->date('date');
			$table->string('duration', 100);
			$table->integer('community_center_id')->unsigned();
			$table->integer('event_type_id')->unsigned();
			$table->integer('guest_count')->nullable()->unsigned();
			$table->text('notes')->nullable();
			$table->integer('subtotal_amount')->unsigned();
			$table->integer('discount')->unsigned();
			$table->integer('total_amount')->unsigned();
			$table->integer('logged_by')->unsigned();;
			$table->timestamps();

			$table->foreign('community_center_id')
				->references('id')->on('community_centers')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('event_type_id')
				->references('id')->on('event_types')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('logged_by')
				->references('id')->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('bookings');
	}
}

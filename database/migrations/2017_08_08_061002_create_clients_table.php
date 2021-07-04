<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->integer('community_center_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->string('name',100);
            $table->string('mobile',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('email',100)->nullable();
            $table->timestamps();

			$table->foreign('booking_id')
				->references('id')->on('bookings')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('community_center_id')
				->references('id')->on('community_centers')
				->onDelete('cascade')
				->onUpdate('cascade');

			$table->foreign('creator_id')
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
        Schema::dropIfExists('clients');
    }
}

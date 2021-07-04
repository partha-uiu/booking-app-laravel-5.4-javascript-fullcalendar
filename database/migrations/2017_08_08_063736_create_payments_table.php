<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->integer('received_by')->nullable()->unsigned();
            $table->integer('paid_amount')->unsigned();
            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('received_by')
                ->references('id')->on('users')
                ->onDelete('set null')
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
        Schema::dropIfExists('payments');
    }
}

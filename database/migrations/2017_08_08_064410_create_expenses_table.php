<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('expense_category_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->integer('logged_by')->nullable()->unsigned();
            $table->integer('community_center_id')->unsigned();
            $table->timestamps();

            $table->foreign('expense_category_id')
                ->references('id')->on('expense_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('logged_by')
                ->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('community_center_id')
                ->references('id')->on('community_centers')
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
        Schema::dropIfExists('expenses');
    }
}

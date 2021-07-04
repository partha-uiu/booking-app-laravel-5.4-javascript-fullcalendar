<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityCenterExpenseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_center_expense_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('community_center_id')->unsigned();
            $table->integer('expense_category_id')->unsigned();
            $table->timestamps();

            $table->foreign('community_center_id')
                ->references('id')->on('community_centers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('expense_category_id')
                ->references('id')->on('expense_categories')
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
        Schema::dropIfExists('community_center_expense_category');
    }
}

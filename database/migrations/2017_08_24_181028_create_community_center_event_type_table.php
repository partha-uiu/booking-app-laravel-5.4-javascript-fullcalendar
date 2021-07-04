<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityCenterEventTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_center_event_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('community_center_id')->unsigned();
            $table->integer('event_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('community_center_id')
                ->references('id')->on('community_centers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('event_type_id')
                ->references('id')->on('event_types')
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
        Schema::dropIfExists('community_center_event_type');
    }
}

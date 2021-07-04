<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role_id')->unsigned();
            $table->integer('community_center_id')->unsigned();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade')
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
        Schema::dropIfExists('users');
    }
}

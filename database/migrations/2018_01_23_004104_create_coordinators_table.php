<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coordinators', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');
            $table->timestamps();
		});

        Schema::table('teams', function($table) {
            $table->foreign('coordinator_id')->references('id')->on('coordinators')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coordinators');
	}

}

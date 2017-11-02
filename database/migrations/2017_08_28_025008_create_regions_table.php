<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teritories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
		});

        Schema::table('states', function($table) {

            $table->foreign('region_id')->references('id')->on('teritories')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */


	public function down()
	{
		Schema::drop('teritories');
	}

}

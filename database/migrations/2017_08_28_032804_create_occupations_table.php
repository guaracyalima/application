<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occupations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
		});

        Schema::table('collaborators', function($table) {
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');
        });

        Schema::table('candidates', function($table) {
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');
        });

        Schema::table('voters', function($table) {
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('occupations');
	}

}

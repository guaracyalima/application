<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducateducationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::create('educations', function(Blueprint $table) {
//            $table->increments('id');
//            $table->string('description');
//            $table->timestamps();
//		});
//
//        Schema::table('collaborators', function($table) {
//            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade');
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('educateducations');
	}

}

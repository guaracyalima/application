<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('educations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
		});

        Schema::table('collaborators', function($table) {
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });

        Schema::table('candidates', function($table) {
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });

        Schema::table('voters', function($table) {
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('educations');
	}

}

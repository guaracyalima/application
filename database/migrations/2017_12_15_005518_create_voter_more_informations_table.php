<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoterMoreInformationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voter_more_informations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer ('voter_id')->unsigned();
            $table->foreign ('voter_id')->references('id')->on('voters')->onDelete('cascade');
            $table->string ('patron_saint');
            $table->string ('tatoo');
            $table->string ('average_salary');
            $table->string ('sexual_preference');
            $table->string ('animal_prerence');
            $table->string ('food_prerence');
            $table->string ('drik_prerence');
            $table->string ('facebook');
            $table->string ('instagram');
            $table->string ('twitter');
            $table->string ('linkedin');
            $table->string ('whatsapp');
            $table->string ('yotube');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('voter_more_informations');
	}

}

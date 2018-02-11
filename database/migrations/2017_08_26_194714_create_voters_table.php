<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voters', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('genre');
            $table->string('birth');
            $table->string('age')->default(0);
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('voter_title')->nullable();
            $table->string('zone_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('address');
            $table->string('stret');
            $table->string('neighborhood');
            $table->string('cep');
            $table->string('city');
            $table->string('uf');
            $table->longText('observation')->nullable();
            $table->integer('education_id')->unsigned()->nullable();
            $table->integer('occupation_id')->unsigned()->nullable();
            $table->string('ddd_cellphone');
            $table->string('cellphone');
            $table->string('ddd_telephone')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
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
		Schema::drop('voters');
	}

}

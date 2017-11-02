<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaboratorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collaborators', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->string('name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('genre');
            $table->string('birth');
            $table->string('cpf');
            $table->string('rg');
            $table->string('voter_title');
            $table->string('zone_id');
            $table->string('session_id');
            $table->string('address');
            $table->string('stret');
            $table->string('neighborhood');
            $table->string('cep');
            $table->string('city');
            $table->string('uf');
            $table->string('proposed_leads');
            $table->string('operation_state');
            $table->string('operation_city');
            $table->string('operation_neighborhoods');
            $table->string('interest');
            $table->string('whatsapp');
            $table->string('salary');
            $table->string('cellphone');
            $table->string('telephone');
            $table->integer('occupation_id')->unsigned();
            $table->integer('education_id')->unsigned();
            $table->longText('observation');
            $table->string('created_by');
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
		Schema::drop('collaborators');
	}

}

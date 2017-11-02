<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('plan_id')->unsigned();
            $table->integer('education_id')->unsigned();
            $table->integer('occupation_id')->unsigned();

            $table->string('name');
            $table->string('title');
            $table->string('politic_name');
            $table->string('cpf');
            $table->string('rg');
            $table->integer('broken_id')->unsigned();
            $table->string('address');
            $table->string('stret');
            $table->string('neighborhood');
            $table->string('cep');
            $table->string('city');
            $table->string('uf');
            $table->string('ddd_cellphone');
            $table->string('cellphone');
            $table->string('ddd_telephone');
            $table->string('telephone');
            $table->string('email');
            $table->string('whatsapp');
            $table->longText('biograph');
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
		Schema::drop('candidates');
	}

}

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
            $table->longText('observation');
            $table->integer('education_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->string('ddd_cellphone');
            $table->string('cellphone');
            $table->string('ddd_telephone');
            $table->string('telephone');
            $table->string('email');
            $table->string('whatsapp');
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
		Schema::drop('voters');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('max_users');
            $table->string('max_electors');
            $table->string('sms_quantity');
            $table->string('emails_quantity');
            $table->string('price');
            $table->string('renewal_frequency');
            $table->timestamps();
		});

        Schema::table('candidates', function($table) {

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plans');
	}

}

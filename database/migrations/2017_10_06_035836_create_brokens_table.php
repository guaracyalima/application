<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokensTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brokens', function(Blueprint $table) {
            $table->increments('id');
            $table->string ('name');
            $table->string ('description');
            $table->timestamps();
		});

        Schema::table('candidates', function($table) {
            $table->foreign('broken_id')->references('id')->on('brokens')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brokens');
	}

}

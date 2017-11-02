<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendmailsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sendmails', function(Blueprint $table) {
            $table->increments('id');
            $table->string('from');
            $table->string('sender');
            $table->string('to');
            $table->longText('content');
            $table->longText('cc');
            $table->longText('bcc');
            $table->string('replyTo');
            $table->string('subject');
            $table->string('priority');
            $table->string('attach');
            $table->string('attachData');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('sendmails');
	}

}

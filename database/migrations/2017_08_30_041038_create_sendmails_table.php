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
            $table->string('from')->nullable();
            $table->string('sender')->nullable();
            $table->string('to')->nullable();
            $table->longText('content')->nullable();
            $table->longText('cc')->nullable();
            $table->longText('bcc')->nullable();
            $table->string('replyTo')->nullable();
            $table->string('subject')->nullable();
            $table->string('priority')->nullable();
            $table->string('attach')->nullable();
            $table->string('attachData')->nullable();
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

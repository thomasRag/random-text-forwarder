<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('twilio_sid');
			$table->text('body');
      $table->integer('sender_id')->unsigned();
      $table->foreign('sender_id')->references('id')->on('contacts');
      $table->integer('recipient_id')->unsigned();
      $table->foreign('recipient_id')->references('id')->on('contacts');
      $table->enum('status', array('created','sent', 'received'));
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
		Schema::drop('messages');
	}

}

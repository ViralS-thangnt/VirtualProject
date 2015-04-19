<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 16);
			$table->string('email')->unique();
			$table->string('password', 65);
			$table->string('kana', 16);

			$table->boolean('sex')->nullable();
			$table->integer('role_id');
			$table->string('phone')->nullable();
			$table->string('note')->nullable();
			$table->integer('boss_id')->nullable();
			$table->timestamp('birthday');
			$table->boolean('enable', 1);


			$table->rememberToken();
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
		Schema::drop('users');
	}

}

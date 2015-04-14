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
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 64);
			$table->string('kana');

			$table->boolean('sex')->nullable();
			$table->integer('role_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('note')->nullable();
			$table->integer('boss_id');
			$table->string('birthday')->nullable();
			$table->boolean('enable');
			$table->string('created_at');
			$table->string('updated_at');

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

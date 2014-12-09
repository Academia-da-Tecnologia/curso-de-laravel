<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_users', function($tabela){
			$tabela->increments('id');
			$tabela->string('tb_user_nome',50);
			$tabela->string('username',50);
			$tabela->string('password',100);
			$tabela->integer('tb_user_is_admin');
			$tabela->string('remember_token',100);
			$tabela->string('tb_user_foto',100);
			$tabela->integer('tb_user_is_autor');
			$tabela->integer('tb_user_is_admin_geral');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_users');
	}

}

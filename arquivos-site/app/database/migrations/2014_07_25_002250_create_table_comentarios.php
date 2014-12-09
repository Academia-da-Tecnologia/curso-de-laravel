<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComentarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_comentarios', function($tabela){
			$tabela->increments('id');
			$tabela->string('tb_comentario_nome',50);
			$tabela->integer('tb_comentario_post');
			$tabela->string('tb_comentario_foto',100);
			$tabela->string('tb_comentario_email',50);
			$tabela->timestamp('tb_comentario_data');
			$tabela->integer('tb_comentario_autor_post',11);
			$tabela->text('tb_comentario_texto');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_comentarios');
	}

}

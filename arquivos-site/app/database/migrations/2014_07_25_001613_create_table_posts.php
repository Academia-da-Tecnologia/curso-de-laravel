<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_posts', function($tabela){
			$tabela->increments('id');
			$tabela->string('tb_post_titulo',100);
			$tabela->integer('tb_post_autor');
			$tabela->timestamp('tb_post_data');
			$tabela->string('tb_post_foto',100);
			$tabela->text('tb_post_tags');
			$tabela->integer('tb_post_categoria');
			$tabela->string('tb_post_slug',80);
			$tabela->integer('tb_post_visitas');
			$tabela->string('tb_post_thumb',100);
			$tabela->text('tb_post_mensagem');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_posts');
	}

}

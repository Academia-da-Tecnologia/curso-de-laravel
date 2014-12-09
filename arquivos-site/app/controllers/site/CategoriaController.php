<?php

namespace app\controllers\site;
use \app\models\site\PostModel as post;
use \app\models\site\CategoriaModel as categoria;

class CategoriaController extends \BaseController {

	use \app\traits\LoadVariables;


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$this->LoadVariables();
		$this->loadVariable('redirect');
		$this->loadVariable('validate');

		$postsCategoria = categoria::listarPostsCategoria( $slug );
		$categoria = categoria::where('tb_categoria_slug', $slug)->first();

		return \View::make('site.categoria')->with([
            'titulo' => "Categoria | $categoria->tb_categoria_nome",
            'categorias' => $this->categorias,
            'posts' => $this->posts,
            'maisComentados' => $this->maisComentados,
            'maisVistos' => $this->maisVistos,
            'postsCategoria' => $postsCategoria->getCollection(),
            'links' => $postsCategoria->links(),
            'tags' => $this->tags,
            'ultimosComentarios' => $this->ultimosComentarios,
            'categoria' => $categoria,
            'i' => 1
        ]);

	}
}

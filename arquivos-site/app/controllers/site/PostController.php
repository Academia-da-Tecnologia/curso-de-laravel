<?php
namespace app\controllers\site;
use \app\models\site\PostModel as post;
use \app\models\site\ComentarioModel as comentarios;

class PostController extends \BaseController {

	use \app\traits\LoadVariables;

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{

		$this->loadVariables();	
		$post = post::where('tb_post_slug',$slug)->first();
 
        $visitas = new \app\acme\AdicionarVisitaAoPost();
        $visitas->adicionarVisita( $post->id );

        $comentarios = comentarios::listarComentarios( $post->id );

		return \View::make('site.post')->with([
			'titulo' => 'Curso de Laravel | '.$post->tb_post_titulo,
            'categorias' => $this->categorias,
            'posts' => $this->posts,
            'maisComentados' => $this->maisComentados,
            'maisVistos' => $this->maisVistos,
            'comentarios' => $comentarios,
            'tags' => $this->tags,
            'post' => $post,
             'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
		]);

	}


}

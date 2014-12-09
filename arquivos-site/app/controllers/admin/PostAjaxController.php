<?php

namespace app\controllers\admin;
use \app\models\admin\PostModel as post;
use \app\models\admin\CategoriaModel as categoria;

class PostAjaxController extends \BaseController {

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			
		$categorias = categoria::all();
		$post = post::find( $id );	
		$data = [ 'categorias' => $categorias, 'post' => $post ];
		return $data;


	}


}

<?php
namespace app\controllers\site;
use \app\models\site\PostModel as post;
use \app\acme\TagsAcme as tags;

class HomeController extends \BaseController {

    use \app\traits\LoadVariables;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $this->loadVariables();
 
        $data = [
            'titulo' => 'Página Incial | Curso Laravel',
            'maisComentados' => $this->maisComentados,
            'posts' => $this->posts,
            'tags'=> $this->tags,
            'categorias' => $this->categorias,
            'maisVistos' => $this->maisVistos,
            'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
		return \View::make('site.home')->with($data);
	}

    


}

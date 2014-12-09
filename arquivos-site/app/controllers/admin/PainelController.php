<?php

namespace app\controllers\admin;
use \app\models\admin\PostModel as post;

class PainelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $posts = post::listaPosts();
        $data = ['posts' => $posts];


		return \View::make('admin.painel.home')->with($data);
	}


}

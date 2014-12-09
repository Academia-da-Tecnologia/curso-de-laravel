<?php

namespace app\controllers\admin;

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$idUser = \Auth::user()->id;

		$posts = \app\models\admin\PostModel::select('*', 'tb_posts.id as idPost')
		->join('tb_users','tb_posts.tb_post_autor', '=', 'tb_users.id')
		->join('tb_categorias', 'tb_posts.tb_post_categoria', '=', 'tb_categorias.id')
		->groupBy('tb_posts.id')
		->paginate(10);

		$postsUser = \app\models\admin\PostModel::where('tb_post_autor',$idUser)->get();

		$data = [
			'posts' => $posts->getCollection(),
			'links' => $posts->links(),
			'idUser' => $idUser,
			'postsUser' => $postsUser
		];

		return \View::make('admin.painel.post')->with($data);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$idUser = \Auth::user()->id;
		$categorias = \app\models\admin\CategoriaModel::all()->lists('tb_categoria_nome','id');
		$data = ['categorias' => $categorias ,'idUser' => $idUser];
		return \View::make('admin.painel.postCadastrar')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$rules = [
			'titulo' => 'required|unique:tb_posts,tb_post_titulo',
			'tags' => 'required',
			'categoria' => 'required',
			'slug' => 'required',
			'post' => 'required'
		];

		/*mensagem personalizada*/
		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(),$rules,$messages);

		if($validator->fails()){
			return \Redirect::back()
			->withInput(\Input::all())
			->withErrors($validator->messages());
		}else{
			$attributes = [
				'tb_post_titulo' => \Input::get('titulo'),
                'tb_post_tags' => \Input::get('tags'),
                'tb_post_categoria' => \Input::get('categoria'),
                'tb_post_autor' => \Input::get('idUser'),
                'tb_post_slug' => \Input::get('slug'),
                'tb_post_mensagem' => \Input::get('post'),
                'tb_post_data' => date("Y-m-d H:i:s")
			];

			$cadastrado = \app\models\admin\PostModel::create($attributes);

			if($cadastrado){
				return \Redirect::back()->with('mensagem','<div class="text-success">Cadastrado com sucesso !!</div>');
			}else{
				return \Redirect::back()->with('mensagem','<div class="text-danger">Erro ao cadastrar</div>');
			}
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = \app\models\admin\PostModel::find($id);

		$categorias = \app\models\admin\CategoriaModel::all();

		if(!isset($post->tb_post_autor) || $post->tb_post_autor != \Auth::user()->id){
			return \Redirect::to('/lista/post');
		}

		$data = [
			'post' => $post,
			'categorias' => $categorias
		];

		return \View::make('admin.painel/postEditar')->with($data);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'titulo' => 'required|unique:tb_posts,tb_post_titulo,'.$id,
			'tags' => 'required',
			'categoria' => 'required',
			'slug' => 'required',
			'post' => 'required'
		];

		/*mensagem personalizada*/
		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(),$rules,$messages);

		if($validator->fails()){
			return \Redirect::back()
			->withInput(\Input::all())
			->withErrors($validator->messages());
		}else{
			$attributes = [
				'tb_post_titulo' => \Input::get('titulo'),
				'tb_post_tags' => \Input::get('tags'),
				'tb_post_categoria' => \Input::get('categoria'),
				'tb_post_slug' => \Input::get('slug'),
				'tb_post_mensagem' => \Input::get('post'),
			];

			$atualizado = \app\models\admin\PostModel::where('id', $id)->update($attributes);

			if($atualizado){
				return \Redirect::back()->with('mensagem','<div class="text-success">Alterado com sucesso !</div>');
			}else{
				return \Redirect::back()->with('mensagem','<div class="text-danger">Ocorreu um erro interno ao tentar atualizar, tente novamente !</div>');
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$delete = \app\models\admin\PostModel::find($id);

		if(\Auth::user()->id != $delete->tb_post_autor){
			return \Redirect::to('/painel');
		}

		$delete->delete();
		return \Redirect::to('/lista/post');
	}


}

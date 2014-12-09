<?php

namespace app\controllers\admin;

class PostFotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'foto' => 'required|image'
		];

		$file = \Input::file('foto');

		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator->messages());
        } else {

        	$extension = $file->getClientOriginalExtension();

        	$idPost = \Input::get('idPost');

        	$dadosPost = \app\models\admin\PostModel::find($idPost);

        	$imagem = new \app\acme\ImagemAcme( $file );
        	$imagem->excluirFoto($dadosPost->tb_post_foto);
			$imagem->excluirFoto($dadosPost->tb_post_thumb);

			$fotoRenomeada = $imagem->renomearFoto();

			$caminhoFoto = 'uploads/posts/'.$fotoRenomeada.'.'.$extension;
			$caminhoThumb = 'uploads/posts/thumbs/'.$fotoRenomeada.'.'.$extension;

			$imagem->salvarFoto( $caminhoFoto, ['largura' => 800,'altura' => 600] );
			$imagem->salvarFoto( $caminhoThumb, ['largura' => 250,'altura' => 200] );

			$atualizado = \app\models\admin\PostModel::where('id',$idPost);
			$atualizado->update([
				'tb_post_foto' => 'uploads/posts/'.$fotoRenomeada.'.'.$extension,
				'tb_post_thumb' => 'uploads/posts/thumbs/'.$fotoRenomeada.'.'.$extension
			]);

			if($atualizado){
				return \Redirect::to('fotoPost/'.$idPost.'/edit')->with('mensagem','<div class="text-success">Atualizado !!!</div>');
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
		$data = ['post' => $post];
		return \View::make('admin.painel.postFoto')->with($data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

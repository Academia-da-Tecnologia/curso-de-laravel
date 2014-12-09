<?php

namespace app\controllers\site;
use \app\models\site\UserModel as user;

class UserFotoController extends \BaseController {

	use \app\traits\LoadVariables;

	public function __construct(){
		$this->loadVariables();
		$this->loadVariable('redirect');
		$this->LoadVariable('validate');
	}

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		
		if( $id != \Auth::user()->id ){
			return $this->redirect->to("/");
		}

		$user = user::find( $id );

		$data = [
            'titulo' => 'Alterar Foto | Curso Laravel',
            'maisComentados' => $this->maisComentados,
            'posts' => $this->posts,
            'tags'=> $this->tags,
            'categorias' => $this->categorias,
            'maisVistos' => $this->maisVistos,
            'user' => $user,
             'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
		return \View::make('site.userFoto')->with($data);

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
			'foto' => 'required|image'
		];

		if( !$this->validate->isValid( $rules ) ){
			return $this->validate->errorsValidate( 'userFoto/'.$id.'/edit' );
		}else{

			$file = \Input::file('foto');

			$extension = $file->getClientOriginalExtension();

        	$dadosCliente = user::find($id);

        	$imagem = new \app\acme\ImagemAcme( $file );
        	$imagem->excluirFoto($dadosCliente->tb_user_foto);

			$fotoRenomeada = $imagem->renomearFoto();

			$caminhoFoto = 'uploads/users/'.$fotoRenomeada.'.'.$extension;

			$imagem->salvarFoto( $caminhoFoto, ['largura' => 800,'altura' => 600] );
			$atualizado = $dadosCliente->update([
				'tb_user_foto' => 'uploads/users/'.$fotoRenomeada.'.'.$extension,
			]);

			if($atualizado){
				$this->redirect->setMensagem( 'Foto alterada com sucesso !' );
				return $this->redirect->to( "/userFoto/$id/edit" );
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
		//
	}


}

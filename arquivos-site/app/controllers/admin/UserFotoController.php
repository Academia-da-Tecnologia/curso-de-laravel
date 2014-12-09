<?php

namespace app\controllers\admin;
use Intervention\Image\ImageManagerStatic as Image;

class UserFotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id = \Auth::user()->id;
		$dadosAsministrador = \app\models\admin\UserModel::find($id);

		$data = ['administrador' => $dadosAsministrador]; 
		
		return \View::make('admin.painel.userFoto')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$file = \Input::file('foto');

		/*validacao*/
		$rules = [
			'foto' => 'required|image'
		];

		/*mensagem personalizada*/
		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(),$rules,$messages);

		if($validator->fails()){
			return \Redirect::back()->withErrors($validator->messages());
		}else{

			/*pegar extensao do arquivo*/
			$extensaoFoto = $file->getClientOriginalExtension();

			$imagem = new \app\acme\ImagemAcme(\Input::file('foto'));
			$imagem->setExtensoesAceitas(['jpeg','jpg']);

			if(!$imagem->extensaoPermitida()){
				return \Redirect::back()
				->with(['mensagem' => "<span class='text-danger'>Extensão não aceita</span>"]);
			}else{

				/*id do administrador logado*/
				$idAdministradorLogado = \Auth::user()->id;

				/*pegar dados do administrador*/
				$dadosAdministrador = \app\models\admin\UserModel::find($idAdministradorLogado);

				/*excluir imagem*/
				$imagem->excluirFoto($dadosAdministrador->tb_user_foto);

				/*renomear foto*/
				$fotoRenomeada = $imagem->renomearFoto();

				$caminhoFoto = 'uploads/users/'.$fotoRenomeada.'.'.$extensaoFoto;

				/*salva a foto na pasta*/
				$imagem->salvarFoto($caminhoFoto,['largura' => 800,'altura' => 600]);

				/*salvar no banco*/
				$atualizado = \app\models\admin\UserModel::where('id',$idAdministradorLogado)
				->update([
					'tb_user_foto' => 'uploads/users/'.	$fotoRenomeada.'.'.$extensaoFoto
				]);

				if($atualizado){
					return \Redirect::back()->with(['mensagem' => "<span class='text-success'>Foto alterada com sucesso !!</span>"]);
				}
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
			
		if( !isset( $id ) || $id == null || $id != \Auth::user()->id){
			return \Redirect::to('/painel');
		}	

		$dadosUser = \app\models\admin\UserModel::find( $id );

		$data = ['user' => $dadosUser];

		return \View::make('admin.painel.userFoto')->with($data);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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

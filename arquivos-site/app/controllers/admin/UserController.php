<?php

namespace app\controllers\admin;

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		/*id do usuario logado*/
		$idUser = \Auth::user()->id;

		$verificarAdminGeral = new \app\acme\AcessoAdminGeral();
        $adminGeral = $verificarAdminGeral->isAdminGeral();

		$dadosAdministradores = \app\models\admin\UserModel::where('tb_user_is_admin','=',1)
		->where('tb_user_is_autor','!=', 1)
		->paginate(10);

		$data = ['administradores' => $dadosAdministradores->getCollection(), 
		'links' => $dadosAdministradores->links(),
		'idUser' => $idUser,
		'isAdminGeral' => $adminGeral
		];

		return \View::make('admin.painel.user')->with($data);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin.painel.userCadastrar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'nome' => 'required|unique:tb_users,tb_user_nome',
			'email' => 'required|email|unique:tb_users,username',
			'senha' => 'required'
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
				'tb_user_nome' => \Input::get('nome'),
                'username' => \Input::get('email'),
                'password' => \Hash::make(\Input::get('senha')),
                'tb_user_is_admin' => '1',
                'tb_user_is_autor' => '0'
			];

			$cadastrado = \app\models\admin\UserModel::create($attributes);

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
		$dadosUser = \app\models\admin\UserModel::find($id);

		$verificarAdminGeral = new \app\acme\AcessoAdminGeral();
        $adminGeral = $verificarAdminGeral->verificarAcessoAdminGeral( $id );

        if(!$adminGeral){
            return \Redirect::to('/lista/administrador');
        }

		$data = ['user' => $dadosUser];
		return \View::make('admin.painel.userEditar')->with($data);
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
			'nome' => 'required',
			'username' => 'required|email'
		];

		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(),$rules,$messages);

		if($validator->fails()){
			return \Redirect::back()->withErrors($validator->messages())
									->withInput(\Input::all());
		}else{
			$attributes = [
				'tb_user_nome' => \Input::get('nome'),
				'username' => \Input::get('username')
			];

			$atualizado = \app\models\admin\UserModel::where('id',$id)->update($attributes);

			if($atualizado) {
				return \Redirect::back()->with('mensagem','<div class="text-success">Atualizado com sucesso</div>')	;
			}else{
				return \Redirect::back()->with('mensagem','<div class="text-danger">Erro ao atualizar.</div>')	;
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

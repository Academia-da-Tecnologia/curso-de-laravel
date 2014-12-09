<?php

namespace app\controllers\admin;

class AutorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$idUser = \Auth::user()->id;

        $verificarAdminGeral = new \app\acme\AcessoAdminGeral();
        $adminGeral = $verificarAdminGeral->isAdminGeral();

		$autores = \app\models\admin\UserModel::where('tb_user_is_autor',1)
		->paginate(10);

		$data = [
			'autores' => $autores->getCollection(),
			'links' => $autores->links(),
			'idUser' => $idUser,
            'isAdminGeral' => $adminGeral
		];

		return \View::make('admin.painel.autor')->with($data);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $verificarAdminGeral = new \app\acme\AcessoAdminGeral();
        $adminGeral = $verificarAdminGeral->isAdminGeral();

        if(!$adminGeral){
            return \Redirect::to('/lista/autor');
        }
		  return \View::make('admin.painel.autorcadastrar');

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

		$messages = \app\acme\MessagesAcme::Messages();

        $validator = \Validator::make(\Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()
                            ->withInput(\Input::all())
                            ->withErrors($validator->messages());
        } else {

        	$attributes = [
        		'tb_user_nome' => \Input::get('nome'),
        		'username' => \Input::get('email'),
        		'password' => \Hash::make(\Input::get('senha')),
        		'tb_user_is_admin' => '1',
        		'tb_user_is_autor' => '1'
        	];

        	$cadastrado = \app\models\admin\UserModel::create($attributes);

        	if ($cadastrado) {
                return \Redirect::back()->with('mensagem', '<div class="text-success">Cadastrado com sucesso !</div>');
            } else {
                return \Redirect::back()->with('mensagem', '<div class="text-danger">Ocorreu um erro interno ao tentar fazer o cadastro, tente novamente !</div>');
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
		$dadosAutor = \app\models\admin\UserModel::find( $id );
        $verificarAdminGeral = new \app\acme\AcessoAdminGeral();
        $adminGeral = $verificarAdminGeral->verificarAcessoAdminGeral( $id );

        if(!$adminGeral){
            return \Redirect::to('/lista/autor');
        }

		$data = ['autor' => $dadosAutor];
		return \View::make('admin.painel.autorEditar')->with($data);

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
			'email' => 'required|email|unique:tb_users,username,'.$id
		];

			$messages = \app\acme\MessagesAcme::Messages();

        $validator = \Validator::make(\Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return \Redirect::back()
                    ->withInput(\Input::all())
                    ->withErrors($validator->messages());
        } else {
        	$attributes = [
        		'tb_user_nome' => \Input::get('nome'),
        		'username' => \Input::get('email')
        	];

        	$atualizado = \app\models\admin\UserModel::where('id',$id);
        	$atualizado->update( $attributes );

        	 if ($atualizado) {
                return \Redirect::back()->with('mensagem', '<div class="text-success">Atualizado com sucesso !!</div>');
                ;
            } else {
                return \Redirect::back()->with('mensagem', '<div class="text-danger">Erro ao atualizar</div>');
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
		$autor = \app\models\admin\UserModel::find($id);
		$autor->delete();
		return \Redirect::to('/lista/autor');
	}


}

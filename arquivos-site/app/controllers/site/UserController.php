<?php

namespace app\controllers\site;
use \app\models\site\UserModel as user;

class UserController extends \BaseController {

	use \app\traits\LoadVariables;

	public function __construct(){
		$this->loadVariables();
		$this->loadVariable('validate');
		$this->loadVariable('redirect');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = [
            'titulo' => 'Registro | Curso Laravel',
            'maisComentados' => $this->maisComentados,
            'posts' => $this->posts,
            'tags'=> $this->tags,
            'categorias' => $this->categorias,
            'maisVistos' => $this->maisVistos,
             'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
		return \View::make('site.registro')->with($data);
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
		$this->loadVariable( 'email' );

		$rules = [
   			'nome' => 'required',
            'email' => 'required|unique:tb_users,username',
            'senha' => 'required'
		];

		if( $this->validate->isValid( $rules ) ){

			$attributes = [
			   'tb_user_nome' => \Input::get('nome'),
               'username' => \Input::get('email'),
               'password' => \Hash::make( \Input::get('senha') ),
               'tb_user_is_admin' => 0,
               'tb_user_is_autor' => 0,
               'tb_user_is_admin_geral' => 0,
               'tb_user_is_user' => 1
			];

			if( user::create( $attributes ) ){

				$data = [
					'nome' => \Input::get('nome'),
                    'assunto' => 'Registro portal de noticias',
                    'data' => date('d/m/Y H:i:s'),
                    'email' => 'screenplus@outlook.com',
                    'senha' => \Input::get('senha'),
                    'emailDestino' => \Input::get('email'),
				];

				$this->email->enviarEmail( 'emails.registro', $data );
				$this->redirect->setMensagem( 'Registro feito com sucesso !!' );
				return $this->redirect->to( '/user' );
			}else{
				$this->redirect->setMensagem( 'Erro ao cadastrar usuário !!!' );
				return $this->redirect->to( '/user' );
			}

		}else{
			return $this->validate->errorsValidate( '/user' );
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
		
		if( $id != \Auth::user()->id ){
			return $this->redirect->to("/");
		}

		$user = user::find( $id );

		$data = [
            'titulo' => 'Registro | Curso Laravel',
            'maisComentados' => $this->maisComentados,
            'posts' => $this->posts,
            'tags'=> $this->tags,
            'categorias' => $this->categorias,
            'maisVistos' => $this->maisVistos,
            'user' => $user,
            'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
		return \View::make('site.userEditar')->with($data);


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
			'email' => 'required|unique:tb_users,username,'.$id
		];

		if( !$this->validate->isValid( $rules ) ){
			return $this->validate->errorsValidate( 'userEdit/'.$id.'/edit' );
		}else{

			$nome = \Input::get('nome');
			$email = \Input::get('email');	

			$attributes = [
				'tb_user_nome' => $nome,
				'username' => $email
			];

			$user = user::find( $id );
			$user->update( $attributes );

			$this->redirect->setMensagem( 'Atualizado com sucesso !!!' );
			return $this->redirect->to( 'userEdit/'.$id.'/edit' );

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

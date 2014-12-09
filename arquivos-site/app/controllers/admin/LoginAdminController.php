<?php

namespace app\controllers\admin;

class LoginAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.loginAdmin');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		/*fazer validacao*/
		$rules = [
			'email' => 'required|email',
			'password' => 'required'
		];

		/*personalizar mensagens de erro*/
		$messages = [
			'required' => '<span class="text-danger">O campo :attribute é obrigatório</span>',
			'email' => '<span class="text-danger">Digite um e-mail válido</span>'
		];

		$validator = \Validator::make(\Input::all(), $rules,$messages);

		if($validator->fails()){
			return \Redirect::to('/admin')
			->withErrors($validator->messages());
		}else{
			$credentials = [
				'username' => \Input::get('email'),
				'password' => \Input::get('password')
			];	

			$auth = \Auth::attempt($credentials);

			if($auth){
				return \Redirect::to('/painel');
			}else{
				return \Redirect::to('/admin')
				->with('mensagem', '<span class="text-danger">Ocorreu um erro ao logar, tente novamente</span>');
			}

		}

	}

	public function destroy()
	{
		\Auth::logout();
		session_destroy();
		return \Redirect::to('/admin');
	}


}

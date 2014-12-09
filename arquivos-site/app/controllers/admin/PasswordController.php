<?php

namespace app\controllers\admin;

class PasswordController extends \BaseController {

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*verifica se o id é realmente do user logado*/
		if(\Auth::user()->id != $id){
			return \Redirect::to('/lista/administrador');
		}

		$idUser = \Auth::user()->id;
		$data = ['idUser' => $idUser];

		return \View::make('admin.painel.userPassword')->with($data);


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
			'atual' => 'required',
			'nova' => 'required|unique:tb_users,password',
			'novamente' => 'required'
		];

		$messages = \app\acme\MessagesAcme::Messages();

		$validator = \Validator::make(\Input::all(),$rules,$messages);

		if($validator->fails()){
			return \Redirect::back()->withErrors($validator->messages());
		}else{

			if(\Hash::check(\Input::get('atual'), \Auth::user()->password )){

				if(\Input::get('nova') == \Input::get('novamente')){
					$attributes = [
						'password' => \Hash::make(\Input::get('nova'))
					];

					$atualizado = \app\models\admin\UserModel::where('id',$id)->update($attributes);

					if($atualizado){
						return \Redirect::back()->with('mensagem','<div class="text-success">Atualizado com sucesso !!</div>');;
					}else{
						return \Redirect::back()->with('mensagem','<div class="text-danger">Erro ao atualizar</div>');
					}

				}else{
					return \Redirect::back()
					->withInput(\Input::all())
					->with('mensagem','<div class="text-danger">As senhas não combinam</div>');
				}

			}else{
				return \Redirect::back()
				->withInput(\Input::all())
				->with('mensagem','<div class="text-danger">Digite sua senha atual novamente</div>');
			}
			//$2y$10$A0y1ZS6qSauOqyHQMzFqCOM5CM0CT6x.PjVSIOA5rPkCPs7Tf.mfK
			//$2y$10$qQ8xZSGdwGlqadSR46B.uuSr.xONtp5FmqpYj62otzdPLVlfBxnoO

		}
	}
}

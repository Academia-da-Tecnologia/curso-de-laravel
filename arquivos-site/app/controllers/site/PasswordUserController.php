<?php
namespace app\controllers\site;
use \app\models\site\UserModel as user;

class PasswordUserController extends \BaseController {

	use \app\traits\LoadVariables;

    public function __construct(){
        $this->loadVariables();
        $this->loadVariable('validate');
        $this->loadVariable('redirect');
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
            return $this->redirect->toFile( '/' );
        }

         $data = [
            'titulo' => 'Alterar Senha | Curso Laravel',
            'categorias' => $this->categorias,
            'posts' => $this->posts,
            'maisComentados' => $this->maisComentados,
            'maisVistos' => $this->maisVistos,
            'tags' => $this->tags,
             'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
        return \View::make('site.password')->with($data);

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
			'nova' => 'required',
			'novamente' => 'required|same:nova'
		];

		$atual = \Input::get('atual');
		$nova = \Input::get('nova');
		$novamente = \Input::get('novamente');

		if( !$this->validate->isValid( $rules, 'legiveis' ) ){
			return $this->validate->errorsValidate( "passwordUser/$id/edit" );
		}else{
			$user = user::find( $id );

			if( \Hash::check( $atual , $user->password ) ){
				$user->password = \Hash::make( $nova );
				$user->save();
				$this->redirect->setMensagem( 'Senha atualizada !!!' );
			}else{
				$this->redirect->setMensagem( 'Erro, a senha digitada não é igual a que está no banco de dados.' );
			}
			return $this->redirect->to("/passwordUser/$id/edit");
		}

	}

}

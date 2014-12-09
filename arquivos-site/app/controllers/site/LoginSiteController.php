<?php
namespace app\controllers\site;

class LoginSiteController extends \BaseController {

	public function __construct(){
		$this->beforeFilter('csrf', ['on' => ['post']]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$credentials = [
			'username' => \Input::get('email'),
			'password' => \Input::get('senha')
		];

		$auth = \Auth::attempt( $credentials );

		if( $auth ){
			return 'logado';
		}else{
			return 'nlogado';
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
		\Auth::logout();
		return \Redirect::back();
	}


}

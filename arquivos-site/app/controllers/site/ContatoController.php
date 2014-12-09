<?php 

namespace app\controllers\site;
use \app\acme\EmailAcme as email;

class ContatoController extends \BaseController {

	use \app\traits\LoadVariables;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->loadVariables();
        $data = [
            'titulo' => 'Contato | Curso Laravel',
            'maisComentados' => $this->maisComentados,
            'posts' => $this->posts,
            'tags'=> $this->tags,
            'categorias' => $this->categorias,
            'maisVistos' => $this->maisVistos,
             'ultimosComentarios' => $this->ultimosComentarios,
            'i' => 1
        ];
		return \View::make('site.contato')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->loadVariable('email');
		$this->loadVariable('validate');
		$this->loadVariable('redirect');
		
		$rules = [
            'nome' => 'required',
            'email' => 'required|email',
            'assunto' => 'required',
            'mensagem' => 'required'
        ];

       if( !$this->validate->isValid( $rules ) ){
       		return $this->validate->errorsValidate( '/contato' );
		}else{

			$data = [
                'nome' => \Input::get('nome'),
                'assunto' => \Input::get('assunto'),
                'data' => date('d/m/Y H:i:s'),
                'email' => \Input::get('email'),
                'mensagem' => \Input::get('mensagem'),
                'emailDestino' => 'screenplus@outlook.com'
            ];

            $this->email->enviarEmail( 'emails.contato',$data );
            $this->redirect->setMensagem( 'Enviado com sucesso !!!' );
            return $this->redirect->to( '/contato' );
		}
	}


}

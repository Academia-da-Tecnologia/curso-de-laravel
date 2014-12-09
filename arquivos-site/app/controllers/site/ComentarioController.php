<?php

namespace app\controllers\site;

use \app\models\site\PostModel as post;
use \app\models\site\ComentarioModel as comentarios;

class ComentarioController extends \BaseController {

    use \app\traits\LoadVariables;

    public function __construct(){
        $this->beforeFilter('csrf', ['on' => ['post']]);
    }

	public function store()
	{
	    $this->loadVariables();
        $this->loadVariable('validate');
        $this->loadVariable('redirect');

        $rules = [
            'mensagem' => 'required'
        ];

        $idPost = \Input::get('idPost');
        $post = post::find( $idPost );
  
        if( !$this->validate->isValid( $rules ) ){
            return $this->validate->errorsValidate("/post/$post->tb_post_slug#formComentarios");
        }else{

            comentarios::create([
                'tb_comentario_post' => \Input::get('idPost'),
                'tb_comentario_data' => date('Y-m-d H:i:s'),
                'tb_comentario_autor' => \Input::get('idAutor'),
                'tb_comentario_texto' => \Input::get('mensagem') 
            ]);
            return $this->redirect->toFile("/post/$post->tb_post_slug#formComentarios");
        }

	}


}

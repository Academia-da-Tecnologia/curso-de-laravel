<?php

namespace app\traits;
use \app\models\site\PostModel as post;
use \app\models\site\CategoriaModel as categoria;
use \app\models\site\ComentarioModel as comentarios;
use \app\acme\TagsAcme as tags;
use \app\acme\EmailAcme as email;
use \app\acme\ValidateAcme as validate;
use \app\acme\RedirectAcme as redirect;

trait LoadVariables{

    protected $maisComentados;
    protected $posts;
    protected $maisVistos;
    protected $tags;
    protected $categorias;
    protected $email;
    protected $validate;
    protected $redirect;
    protected $ultimosComentarios;

    protected function loadVariables(){
        $this->maisComentados = post::maisComentados( 4 );
        $this->posts = post::posts( 4 );
        $this->maisVistos = post::maisVistos( 4 );
        $this->ultimosComentarios = comentarios::ultimosComentarios( 4 );
        $this->categorias = categoria::all();
        $tags = new tags();
        $this->tags = $tags->separarTags();
    }

    protected function loadVariable( $tipo ){
          switch( $tipo ) {
                case 'email':
                    $this->email = new email();
                    break;
                case 'validate':
                    $this->validate = new validate();
                    break;
                case 'redirect':
                    $this->redirect = new redirect();
                    break;
            }
    }

}
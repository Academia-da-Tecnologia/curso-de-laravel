<?php

namespace app\controllers\site;
use \app\models\site\PostModel as post;

class BuscaController extends \BaseController {

    use \app\traits\LoadVariables;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function buscaPost(){

       $this->loadVariables();
       $this->LoadVariable('validate');

        $rules = [
            'busca' => 'required'
        ];

       if( !$this->validate->isValid( $rules ) ){
            return $this->validate->errorsValidate('/');
        } else {
            
            $busca = \Input::get('busca');
            $resultadoBusca = post::busca( $busca );

              $data = [
                'titulo' => 'Busca de post | Curso Laravel',
                'categorias' => $this->categorias,
                'posts' => $this->posts,
                'busca' => $resultadoBusca->getcollection(),
                'links' => $resultadoBusca->links(),
                'conteudoBusca' => $busca,
                'maisComentados' => $this->maisComentados,
                'maisVistos' => $this->maisVistos,
                'tags' => $this->tags,
                'ultimosComentarios' => $this->ultimosComentarios,
                'i' => 1
            ];

            return \View::make('site.busca')->with($data);

        }
    }

}

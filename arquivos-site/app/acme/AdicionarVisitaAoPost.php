<?php

namespace app\acme;

use \app\models\site\PostModel as post;

class AdicionarVisitaAoPost{

    private function visitaCadastrada( $id ){

        $visitas = \Session::get('visitas');

        if( $visitas == null ){
            \Session::push('visitas',$id);
            return false;
        }else{

            if( !in_array( $id, $visitas ) ){
                \Session::push('visitas',$id);
                return false;
            }else{
                return true;
            }

        }
    }

    public function adicionarVisita( $id ){

        if( !$this->visitaCadastrada( $id ) ){

            $dadosPost = post::find( $id );
            $adicionarMaisUmaVisita = $dadosPost->tb_post_visitas+1;

            $dadosPost->tb_post_visitas = $adicionarMaisUmaVisita;
            $dadosPost->save();

        }

    }


}
<?php

namespace app\acme;

use Redirect as redirect;

class RedirectAcme extends redirect{

    private $mensagem;

    public function setMensagem( $mensagem ){
        $this->mensagem = $mensagem;
    }

    public function to( $file ){
        return parent::to( $file )->with( 'mensagem', $this->mensagem );
    }

    public function toFile( $file ){
        return parent::to( $file );
    }



}
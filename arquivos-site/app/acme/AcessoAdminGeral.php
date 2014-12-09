<?php

namespace app\acme;

class AcessoAdminGeral{

    public function verificarAcessoAdminGeral( $id ){
        if( (\Auth::user()->tb_user_is_admin_geral != 1 AND $id != \Auth::user()->id)
        || ( \Auth::user()->tb_user_is_admin_geral == 1 AND \Auth::user()->tb_user_is_autor == 1) ){
            return false;
        }
        return true;
    }

    public function isAdminGeral(){
        if(\Auth::user()->tb_user_is_admin_geral == 1 AND \Auth::user()->tb_user_is_autor == 0){
            return true;
        }
        return false;
    }


}
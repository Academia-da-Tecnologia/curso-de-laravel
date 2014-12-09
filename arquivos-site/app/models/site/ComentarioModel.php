<?php

namespace app\models\site;

class ComentarioModel extends \Eloquent{

    protected $table = 'tb_comentarios';
    protected $guarded = array();
    public $timestamps = false;

    public static function listarComentarios( $idPost ){
        return parent::select('*', 'tb_users.id as idUser')
        ->join('tb_users','tb_comentario_autor','=','tb_users.id')
        ->orderBy('tb_comentarios.id','DESC')
        ->where('tb_comentario_post', $idPost)
        ->get();
    }


    public static function ultimosComentarios( $limite ){
        return parent::select('*','tb_posts.id as idPost')
        ->join('tb_posts','tb_comentarios.tb_comentario_post', '=', 'tb_posts.id')
        ->join('tb_users','tb_comentarios.tb_comentario_autor', '=', 'tb_users.id')
        ->orderBy('tb_comentarios.id','DESC')
        ->limit( $limite )
        ->get();
    }

}
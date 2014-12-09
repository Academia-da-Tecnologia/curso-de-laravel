<?php

namespace app\models\admin;

class PostModel extends \Eloquent{

    protected $table = 'tb_posts';
    protected $guarded = [];
    public $timestamps = false;

    public static function listaPosts(){
        return parent::select('*','tb_posts.id as idPost')
        ->join('tb_users','tb_posts.tb_post_autor','=','tb_users.id')
        ->join('tb_categorias','tb_posts.tb_post_categoria','=','tb_categorias.id')
        ->groupBy('tb_posts.id')
        ->get();
    }

}
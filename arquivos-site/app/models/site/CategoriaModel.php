<?php

namespace app\models\site;

class CategoriaModel extends \Eloquent{

    protected $table = 'tb_categorias';
    protected $guarded = [];
    public $timestamps = false;

    public static function listarPostsCategoria( $slug ){
        return parent::select( '*','tb_posts.id as idPost' )
        ->join('tb_posts','tb_categorias.id','=','tb_posts.tb_post_categoria')
        ->join('tb_users','tb_posts.tb_post_autor','=','tb_users.id')
        ->where('tb_categorias.tb_categoria_slug', $slug)
        ->groupBy('tb_posts.id')
        ->orderBy('tb_posts.id', 'DESC')
        ->paginate(10);
    }

}
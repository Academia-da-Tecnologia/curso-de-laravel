<?php

namespace app\models\site;

class PostModel extends \Eloquent{

    protected $table = 'tb_posts';
    protected $guarded = [];
    public $timestamps = false;

    public static function maisComentados( $limite ){

        $maisComentados = \DB::select( \DB::raw(
            "select * from ( select 
                tb_post_titulo,
                tb_post_foto,
                tb_post_slug,
                tb_post_mensagem,
                tb_user_nome,
                tb_post_data,
                count( c.tb_comentario_post ) as numeroComentarios 
            from tb_posts p,
            tb_users u,
            tb_comentarios c
            where c.tb_comentario_post = p.id
            and u.id = p.tb_post_autor
            group by p.id
            order by c.id DESC
            ) as queryPostComentarios
            limit $limite"
        ));
        return $maisComentados;
    }

    public static function posts( $numeroPosts ){
        return parent::select('*','tb_posts.id as idPost')
        ->join('tb_users', 'tb_posts.tb_post_autor','=','tb_users.id')
        ->join('tb_categorias','tb_posts.tb_post_categoria','=','tb_categorias.id')
        ->groupBy('tb_posts.id')
        ->remember(10)
        ->orderBy('tb_posts.id','DESC')
        ->limit( $numeroPosts )
        ->get();
    }

    public static function totalComentarios( $id ){
        return parent::join('tb_comentarios','tb_posts.id','=','tb_comentario_post')
        ->where('tb_comentario_post',$id)
        ->count();
    }

    public static function maisVistos( $numeroPosts ){
        return parent::select("*")
        ->join('tb_categorias','tb_posts.tb_post_categoria','=','tb_categorias.id')
        ->join('tb_users','tb_posts.tb_post_autor','=','tb_users.id')
        ->orderBy('tb_posts.tb_post_visitas','DESC')
        ->limit($numeroPosts)
        ->get();
    }

    public static function busca( $busca ){
         return parent::select('*','tb_posts.id as idPost')
        ->leftJoin('tb_users','tb_posts.tb_post_autor' , '=' ,'tb_users.id')
        ->join('tb_categorias','tb_posts.tb_post_categoria','=','tb_categorias.id')
        ->where('tb_post_tags','LIKE', "%$busca%")
        ->groupBy('tb_posts.id')
        ->orderBy('tb_posts.id','Desc')
        ->paginate(10);
    }


}
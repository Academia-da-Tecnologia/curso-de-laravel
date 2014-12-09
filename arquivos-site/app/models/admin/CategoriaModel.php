<?php

namespace app\models\admin;

class CategoriaModel extends \Eloquent{

    protected $table = 'tb_categorias';
    protected $guarded = [];
    public $timestamps = false;

    public function post(){
        return $this->hasMany('\app\models\admin\PostModel','tb_post_categoria');
    }

    protected static function boot(){
        parent::boot();

        static::deleting(function( $post ){
            $post->post()->delete();
        });
    }

}
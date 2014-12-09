<?php

namespace app\models\admin;

class UserModel extends \Eloquent{

	protected $table = 'tb_users';
	protected $guarded = [];
	public $timestamps = false;

    public function post(){
        return $this->hasMany('\app\models\admin\PostModel','tb_post_autor');
    }

    public function comentarios(){
        return $this->hasMany('\app\models\admin\ComentarioModel','tb_comentario_autor_post');
    }

    protected static function boot(){
        parent::boot();

        static::deleting(function( $post ){
            $post->post()->delete();
            $post->comentarios()->delete();
        });
    }

}
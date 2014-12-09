<?php

/*Admin*/
Route::resource('/admin','app\controllers\admin\LoginAdminController',['only' => ['index'] ]);

Route::resource('/adminLogar','app\controllers\admin\LoginAdminController',['only' => ['store']]);


/*rotas que nao administradores nao podem acessar*/
Route::group(['before' => 'blockAcessNotAdmin'], function(){

/*Painel*/
Route::resource('/painel', 'app\controllers\admin\PainelController');

/*listar posts*/
Route::resource('/lista/post','app\controllers\admin\PostController',['only' => ['index'] ]);

/*post*/
Route::resource('/post','app\controllers\admin\PostController',['only' => ['create','store','destroy','edit','update'] ]);


Route::put('/postUpdate', function(){
    

    if( Request::ajax() ){

        $idPost = \Input::get('idPost');
        
        $attributes = [
            'tb_post_titulo' => \Input::get('titulo'),
            'tb_post_autor' => \Auth::user()->id,
            'tb_post_tags' => \Input::get('tags'),
            'tb_post_categoria' => \Input::get('categoria'),
            'tb_post_slug' => \Input::get('slug'),
            'tb_post_visitas' => \Input::get('visitas'),
            'tb_post_mensagem' => \Input::get('post')
        ];   

        $atualizado = \app\models\admin\PostModel::where('id',$idPost)->update( $attributes );

        if( $atualizado ){
            echo 'atualizado';
        }else{
            echo 'natualizado';
        }

    }
});

Route::delete('/deletarPost/{id}', function( $id ){

    $delete = \app\models\admin\PostModel::find($id);

    $verificarAdminGeral = new \app\acme\AcessoAdminGeral();
    $adminGeral = $verificarAdminGeral->isAdminGeral();

    if( (\Auth::user()->id != $delete->tb_post_autor) AND ( $adminGeral == false ) ){
        echo 'proibido';
    }else{
        @unlink(base_path('public/' . $delete->tb_post_foto));
        @unlink(base_path('public/' . $delete->tb_post_thumb));

        $delete->delete();
        echo 'deletou';
    }


});

/*post jquery*/
Route::resource('/postJquery','app\controllers\admin\PostAjaxController',['only' => ['edit'] ]);

/*foto post*/
Route::resource('/fotoPost','app\controllers\admin\PostFotoController',['only' => ['edit','store'] ]);

/*logou do sistema*/
Route::resource('/logoutAdmin', 'app\controllers\admin\LoginAdminController',['only' => ['index','destroy'] ]);

/*mostra formulario para cadastrar a foto*/
Route::resource('/foto', 'app\controllers\admin\UserFotoController',['only' => ['create','store','show']]);

    /*Rotas que o autor nao pode acessar*/
    Route::group(['before' => 'blockAccessAuthor'], function(){

        /*lista dos users*/
        Route::resource('/lista/administrador','app\controllers\admin\UserController', ['only' => ['index'] ]);

        /*crud user*/
        Route::resource("/user",'app\controllers\admin\UserController',['only' => ['create','store','edit','update']]); 

        /*excluir administrador*/
        Route::delete('/user/destroy/{id}', function($id){
            if(Request::ajax()){
                $administrador = \app\models\admin\UserModel::find($id);
                //$administrador->delete();
                echo 'excluido';
            }else{
                echo 'nexcluido';
            }
        });

        /*lista de categorias*/
        Route::resource('/lista/categoria', 'app\controllers\admin\CategoriaController',['only' => ['index'] ]);

        Route::resource('/categoria', 'app\controllers\admin\CategoriaController',['only' => ['create','store','destroy','edit','update'] ]);

        /*alterar password do administrador*/
        Route::resource('/password', 'app\controllers\admin\PasswordController',['only' => ['index','edit'] ]);

    });

    /*Rotas que somente o autor pode acessar*/
    Route::group(['before' => 'blockAccessNotAuthor'], function(){
        Route::resource('/lista/autor', 'app\controllers\admin\AutorController',['only' => ['index'] ]);

        Route::resource('/autor', 'app\controllers\admin\AutorController',['only' => ['destroy','create','store','edit','update'] ]);
    });

});
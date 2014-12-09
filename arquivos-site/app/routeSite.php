<?php

Route::resource('/', 'app\controllers\site\HomeController',['only' => ['index']]);

Route::resource('/contato', 'app\controllers\site\ContatoController', ['only' => ['index', 'store'] ]);

Route::resource('/user', 'app\controllers\site\UserController', ['only' => ['index','store'] ]);

Route::resource('/userLogin', 'app\controllers\site\LoginSiteController', ['only' => ['store'] ]);

Route::get('/logout','app\controllers\site\LoginSiteController@logout');

Route::resource('/categoria', 'app\controllers\site\CategoriaController', ['only' => ['show'] ]);

Route::resource('/comentario','app\controllers\site\ComentarioController',['only' => ['store']]);

Route::resource('/post', 'app\controllers\site\PostController', ['only' => ['show'] ]);

Route::resource('/tags', 'app\controllers\site\TagsController', ['only' => ['show'] ]);

Route::post('posts/busca', [ 
    'as' => 'posts.busca',
    'uses' => 'app\controllers\site\BuscaController@buscaPost'
]);


Route::group(['before' => 'auth:/'], function(){

    Route::resource('/userEdit', 'app\controllers\site\UserController', ['only' => ['edit', 'update']]);
    
    Route::resource('/userFoto', 'app\controllers\site\UserFotoController', ['only' => ['edit', 'update']]);

    Route::resource('/passwordUser', 'app\controllers\site\PasswordUserController', ['only' => ['edit', 'update']]);

});
<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function( $route, $request, $value )
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest( $value );
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*bloquear acesso as rotas de quem nao é administrador*/
Route::filter('blockAcessNotAdmin', function(){
	if(!isset(Auth::user()->tb_user_is_admin) || 
		Auth::user()->tb_user_is_admin !=1
		){
		return Redirect::guest('/admin');
	}
});

/*bloqueia acesso do autor as rotas*/
Route::filter('blockAccessAuthor', function(){
	if(isset(Auth::user()->tb_user_is_admin) 
	   AND Auth::user()->tb_user_is_admin == 1
	   AND Auth::user()->tb_user_is_autor == 1
	   AND Auth::user()->tb_user_is_admin_geral == 0
	){
		return Redirect::to('/painel');
	}
});

/*bloqueia acesso de quem nao é autor*/
Route::filter('blockAccessNotAuthor', function(){
	if(isset(Auth::user()->tb_user_is_admin) 
	   AND Auth::user()->tb_user_is_admin == 1
	   AND Auth::user()->tb_user_is_autor == 0
	   AND Auth::user()->tb_user_is_admin_geral == 0
	){
		return Redirect::to('/painel');
	}
});


/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

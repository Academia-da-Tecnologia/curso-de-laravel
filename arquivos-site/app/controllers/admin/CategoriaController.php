<?php

namespace app\controllers\admin;

class CategoriaController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorias = \app\models\admin\CategoriaModel::paginate(10);

        return \View::make('admin.painel.categoria')->with(
            [
                'categorias' => $categorias->getCollection(),
                'links' => $categorias->links()
            ]
        );
    }

    public function create(){
        return \View::make('admin.painel.categoriaCadastrar');
    }

    public function store(){

        $rules = [
            'categoria' => 'required|unique:tb_categorias,tb_categoria_nome',
        ];

        $messages = \app\acme\MessagesAcme::Messages();

        $validator = \Validator::make(\Input::all(),$rules,$messages);

        if($validator->fails()){
            return \Redirect::back()
            ->withErrors($validator->messages())
            ->withInput(\Input::all());
        }else{
            $attributes = [
                'tb_categoria_nome' => \Input::get('categoria')
            ];

            $cadastrado = \app\models\admin\CategoriaModel::create($attributes);

            if($cadastrado){
                return \Redirect::back()->with('mensagem','<div class="text-success">Cadastrado com sucesso !</div>');
            }else{
                return \Redirect::back()->with('mensagem','<div class=text-danger>Ocorreu um erro interno ao tentar fazer o cadastro, tente novamente !</div>');
            }
        }

    }

    public function edit( $id ){
        $categoria = \app\models\admin\CategoriaModel::find( $id );

        return \View::make('admin.painel.categoriaEditar')->with([ 'categoria' => $categoria ]);

    }

    public function update( $id ){
        $rules = [
            'categoria' => 'required|unique:tb_categorias,tb_categoria_nome,'.$id
        ];

        $messages = \app\acme\MessagesAcme::messages();

        $validator = \Validator::make(\Input::all(),$rules,$messages);

        if($validator->fails()){
            return \Redirect::back()
            ->withErrors($validator->messages())
            ->withInput(\Input::all());
        }else{
            $attributes = [
                'tb_categoria_nome' => \Input::get('categoria')
            ];

            $atualizado = \app\models\admin\CategoriaModel::where('id',$id);
            $atualizado->update( $attributes );

            if($atualizado){
                return \Redirect::back()->with('mensagem','<div class="text-success">Alterado com sucesso !</div>');
            }else{
                return \Redirect::back()->with('mensagem','<div class="text-danger">Ocorreu um erro interno ao tentar fazer o cadastro, tente novamente !</div>');
            }
        }
    }

    public function destroy( $id ){
        $categoria = \app\models\admin\CategoriaModel::find($id);
        $categoria->delete();
        return \Redirect::to('lista/categoria');
    }


}

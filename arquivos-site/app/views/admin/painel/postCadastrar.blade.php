@extends('admin.painel.layout')

@section('conteudoPainel')
   
    <div id="page-wrapper">
    
        <div class="row">

            <!-- Formulario para cadastrar o post -->
            <h2>Cadastrar Novo Post</h2>

             @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
             @endif
            
            <br />
            
            {{ Form::open(['role' => 'form', 'method' => 'POST', 'route' => 'post.store']) }}
              
              {{ Form::label('Titulo') }}  
              {{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) }} {{ $errors->first('titulo') }}
              <br />

              {{ Form::hidden('idUser', $idUser) }}

              {{ Form::label('Tags') }}  
              {{ Form::text('tags', Input::old('tags'), ['class' => 'form-control']) }} {{ $errors->first('tags') }}
              <br />
              {{ Form::label('Categorias') }}  
             {{ Form::select('categoria', $categorias, Input::old('categoria'),['class' => 'form-control']) }}
            
              <br />
              {{ Form::label('Slug') }}  
              {{ Form::text('slug', Input::old('slug'), ['class' => 'form-control']) }} {{ $errors->first('slug') }}
              <br />
              {{ Form::label('Post') }}  
              {{ Form::textarea('post', Input::old('post'), ['class' => 'form-control']) }} {{ $errors->first('post') }}
              <br />

            {{ Form::submit('Cadastrar',['class' => 'btn btn-primary']) }}

            {{ Form::close() }}

        </div>
   </div>

@stop
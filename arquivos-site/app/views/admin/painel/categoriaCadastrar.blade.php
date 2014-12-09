@extends('admin.painel.layout')

@section('conteudoPainel')
   
    <div id="page-wrapper">
    
        <div class="row">

             <h2>Cadastrar Nova Categoria</h2>
             @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
             @endif
            
            <br />

            {{ Form::open(['role' => 'form', 'method' => 'POST','route' => 'categoria.store']) }}
                {{ Form::label('Categoria') }}
                {{ Form::text('categoria',Input::old('categoria'),['class' => 'form-control']) }} {{ $errors->first('categoria') }}
                <br />
                {{ Form::submit('Cadastrar',['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        </div>
   </div>

@stop
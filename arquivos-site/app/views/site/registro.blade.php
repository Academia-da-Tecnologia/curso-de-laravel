@extends('site.layout')

@section('conteudo')

    <h2>Digite seus dados abaixo para se registrar</h2>
    <br />
    
    @if(Session::has('mensagem'))
        {{ Session::get('mensagem') }}
    @endif

    <br />
    {{ Form::open(['role' => 'form','route' =>'user.store']) }}
    
    {{ Form::label('Nome:') }}
    {{ Form::text('nome',Input::old('nome'),['class' => 'form-control']) }}
    {{ $errors->first('nome') }}
    <br />
    {{ Form::label('E-mail:') }}
    {{ Form::text('email',Input::old('email'),['class' => 'form-control']) }}
    {{ $errors->first('email') }}
    <br />
    {{ Form::label('senha:') }}
    {{ Form::text('senha',Input::old('senha'),['class' => 'form-control']) }}
    {{ $errors->first('senha') }}
    <br />
    {{ Form::label('') }}
    {{ Form::submit('Cadastrar',['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop
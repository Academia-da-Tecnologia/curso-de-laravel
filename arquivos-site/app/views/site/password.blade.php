@extends('site.layout')

@section('conteudo')

    <h2>Alterar sua senha</h2>
    <br />
    
    @if(Session::has('mensagem'))
        {{ Session::get('mensagem') }}
    @endif

    <br />
    {{ Form::open(['role' => 'form', 'method' => 'PUT' , 'route' =>['passwordUser.update', \Auth::user()->id ]]) }}
    
    {{ Form::label('Senha Atual:') }}
    {{ Form::text('atual',Input::old('atual'),['class' => 'form-control']) }}
    {{ $errors->first('atual') }}
    <br />
    {{ Form::label('Senha Nova:') }}
    {{ Form::password('nova',['class' => 'form-control']) }}
    {{ $errors->first('nova') }}
    <br />
    {{ Form::label('Novamente senha nova') }}
    {{ Form::password('novamente',['class' => 'form-control']) }}
    {{ $errors->first('novamente') }}
    <br />
    {{ Form::label('') }}
    {{ Form::submit('Enviar',['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop
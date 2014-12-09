@extends('site.layout')

@section('conteudo')

    <h2>Entre em contato através do formulário abaixo</h2>
    <br />
    
    @if(Session::has('mensagem'))
        {{ Session::get('mensagem') }}
    @endif

    <br />
    {{ Form::open(['role' => 'form','route' =>'contato.store']) }}
    
    {{ Form::label('Nome:') }}
    {{ Form::text('nome',Input::old('nome'),['class' => 'form-control']) }}
    {{ $errors->first('nome') }}
    <br />
    {{ Form::label('E-mail:') }}
    {{ Form::text('email',Input::old('email'),['class' => 'form-control']) }}
    {{ $errors->first('email') }}
    <br />
    {{ Form::label('Assunto:') }}
    {{ Form::text('assunto',Input::old('assunto'),['class' => 'form-control']) }}
    {{ $errors->first('assunto') }}
    <br />
    {{ Form::label('Mensagem:') }}
    {{ Form::textarea('mensagem',Input::old('mensagem'),['class' => 'form-control']) }}
    {{ $errors->first('mensagem') }}
    <br />
    {{ Form::label('') }}
    {{ Form::submit('Enviar',['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@stop
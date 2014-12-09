
@extends('site.layout')

@section('conteudo')


    <h2>Meus dados</h2>

    <p>Todos os campos com * são obrigatórios.</p>

    @if(Session::has('mensagem'))
        {{ Session::get('mensagem') }}
    @endif

    {{ Form::open(['method' => 'PUT', 'route' => [ 'userEdit.update', $user->id ] ]) }}
    
    {{ Form::label('Nome *') }}
    {{ Form::text('nome', $user->tb_user_nome ,['class' => 'form-control']) }}
    {{ $errors->first( 'nome' ) }}
    <br />
    {{ Form::label('Email *') }}
    {{ Form::text('email', $user->username ,['class' => 'form-control']) }}
    {{ $errors->first( 'email' ) }}
    <br />
    {{ Form::submit('Atualizar',['class' => 'btn btn-warning']) }}

    {{ Form::close() }}
    

@stop
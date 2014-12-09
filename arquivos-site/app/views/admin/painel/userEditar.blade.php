@extends('admin.painel.layout')

@section('conteudoPainel')
   
    <div id="page-wrapper">
    
        <div class="row">

            <h2>Foto Cadastrada</h2>
            @if(!empty($user->tb_user_foto))
                <img src="{{ asset($user->tb_user_foto) }}" width="80" height="60"><br /><br />
                <a href='{{ URL::to("foto/$user->id") }}' class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span>Alterar a foto</a>
            @else
                <a href='{{ URL::to("foto/$user->id") }}' class="btn btn-primary"><span class="glyphicon glyphicon-picture"></span>Cadastrar Foto</a>
            @endif   

            <br />

            <h2>Alterar usuário {{ $user->tb_user_nome }}</h2>

            @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
            @endif

            {{ Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['user.update',$user->id]]) }}
                {{ Form::label('Nome') }}
                {{ Form::text('nome', $user->tb_user_nome,['class' => 'form-control']) }} {{ $errors->first('nome') }}  
                    <br />  
                {{ Form::label('Email') }}
                {{ Form::text('username', $user->username,['class' => 'form-control']) }} {{ $errors->first('username') }}  
                    <br />    
                {{ Form::submit('Alterar',['class' => 'btn btn-primary']) }}        
            {{ Form::close() }}

        </div>
   </div>

@stop
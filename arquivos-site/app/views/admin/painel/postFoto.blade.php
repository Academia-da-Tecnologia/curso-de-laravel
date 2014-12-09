@extends('admin.painel.layout')

@section('conteudoPainel')
    <div id="page-wrapper">
    
        <div class="row">
            <h2>Foto atual do post</h2>
            @if(empty($post->tb_post_foto))
                Sem foto
            @else
               {{ HTML::image($post->tb_post_foto, 'foto' ,['width' => 120, 'height' => "90"]) }}   
            @endif

            <br />
            <br />

             @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
             @endif

             <h2>Escolha uma foto para o post</h2>
                {{ Form::open(['files' => true, 'route' => 'fotoPost.store']) }}
                    {{ Form::hidden('idPost',$post->id) }}
                    {{ Form::label('Foto') }}
                    {{ Form::file('foto') }}
                    {{ $errors->first('foto') }}
                    <br />
                    {{ Form::submit('Cadastrar Nova Foto',['class' =>'btn btn-primary']) }}
                {{ Form::close() }}
        </div>

    </div>
@stop    
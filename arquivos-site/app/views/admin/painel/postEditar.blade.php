@extends('admin.painel.layout')

@section('conteudoPainel')

    <div id="page-wrapper">
        <div class="row">
            <h2>Foto Cadastrada</h2>
            @if(empty($post->tb_posts_foto))
                Nenhum foto cadastrada para o post<br />
                <a href="/fotoPost/{{ $post->id }}/edit" class="btn btn-primary">
                <span class="glyphicon glyphicon-picture">Foto
                </a>    
            @else
                {{ HTML::image($post->tb_post_foto,['width' => 80, 'height' => 60]) }}<br />
                <a href="/fotoPost/{{ $post->id }}/edit" class="btn btn-primary">
                <span class="glyphicon glyphicon-picture">Foto
                </a>  
            @endif
        
        <br />
        <br />
            @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
            @endif


            <h2>Alterar Dados do Post</h2>
            {{ Form::open(['role' => 'form', 'method' => 'PUT','route' => ['post.update',$post->id ]]) }}
                {{ Form::label('Titulo') }}
                {{ Form::text('titulo',$post->tb_post_titulo, ['class' => 'form-control']) }} 
                {{ $errors->first('titulo') }}
                    <br />
                {{ Form::label('Tags') }}
                {{ Form::text('tags',$post->tb_post_tags, ['class' => 'form-control']) }} 
                {{ $errors->first('tags') }}
                    <br />
                {{ Form::label('Categorias') }}
                <select name="categoria" class="form-control">

                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if($categoria->id == $post->tb_post_categoria) selected="selected" @endif >{{ $categoria->tb_categoria_nome }}</option>
                    @endforeach

                </select>  
                {{ $errors->first('categoria') }}
                <br />
                {{ Form::label('Slug') }}
                {{ Form::text('slug',$post->tb_post_slug, ['class' => 'form-control']) }} 
                {{ $errors->first('slug') }}
                    <br />
                {{ Form::label('Post') }}
                {{ Form::textarea('post',$post->tb_post_mensagem, ['class' => 'form-control']) }} 
                {{ $errors->first('post') }}
                    <br />
                {{ Form::submit('Alterar',['class' => 'btn btn-primary']) }}

            {{ Form::close() }}

        </div>
    </div>

@stop
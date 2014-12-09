@extends('site.layout')

@section('conteudo')

    <h2> {{ $post->tb_post_titulo }} </h2>
    <div class="conteudo-post">
        {{ $post->tb_post_mensagem }}
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="divider"></div>

    <div id="form-comentarios">
        
        <div id="caixa-texto">
            <a href="#" name="formComentarios"></a>
            @if( \Auth::check() )
                
                <h2> 
                    {{ \Auth::user()->tb_user_nome }}, deixe seu comentário abaixo,    ele é muito importante para nós. 
                </h2>

                <br />

                {{ Form::open( ['role' => 'form', 'route' => 'comentario.store'] ) }}
                {{ Form::hidden('idAutor',\Auth::user()->id ) }}
                {{ Form::hidden('idPost',$post->id ) }}
                {{ $errors->first( 'mensagem' ) }}
                {{ Form::textarea('mensagem', null, ['class' => 'form-control']) }}
                <br />
                {{ Form::submit( 'Enviar Comentário', ['class' => 'btn btn-warning btn-lg btn-block']) }}
                {{ Form::close() }}

            @else
            <p>
                Você tem que se logar para comentar<br />
                Se ainda não tem um cadastro <a href="/user" class="text-danger">clique aqui</a>, ou se tiver <a href="#" data-toggle="modal" class="text-danger" data-target="#modalLogin">clique aqui</a> para se logar.
            </p>
            @endif

        </div>

    </div>
    <br />
    <div id="lista-comentarios">
        <h3> Comentários: ( {{ count( $comentarios ) }} ) </h3>

        @if( count( $comentarios ) == 0 )
            Seja o primeiro a comentar.
        @else
            @foreach( $comentarios as $comentario )
                <div class="comentarios">
                    <div class="row">
                        <div class="col-md-2">
                            {{ HTML::image( $comentario->tb_user_foto,null,['width' => 90, 'height' => 70] ) }}
                        </div>
                        <div class="col-md-8">
                            {{ nl2br( $comentario->tb_comentario_texto ) }}
                            <br />
                            <br />
                            <span class="author"><i class="icon-user3"></i> {{ $comentario->tb_user_nome }} </span>
                            <br />
                            <span class="date"><i class="icon-alarm2"></i>{{ date('d/m/Y H:i:s', strtotime( $comentario->tb_comentario_data )) }}</span>
                        </div>
                    </div> 
                </div>
            @endforeach
        @endif

    </div>
@stop
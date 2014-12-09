@extends('site.layout')

@section('conteudo')

    @if( $busca->isEmpty() )
        Não encontramos nenhum post com o que você digitou.
    @else
        <h2>Sua busca retornou {{ count( $busca ) }} registro(s)</h2>

        <div class="color-red widget-content clearfix">
            <div>
            @foreach($busca as $post)

                <article class="{{ oddEven( $i ) }}-item" data-showonscroll="true" data-animation="fadeIn">
                    <figure class="sec-image">

                        <a class="post-thumbnail">
                    <!--imagem principal do-->
                           {{ HTML::image($post->tb_posts_foto) }}
                        </a>

                        <div class="top-bar">

                          <span class="views"><i class="icon-bubble">
                              {{ \app\models\site\PostModel::totalComentarios($post->idPost) }}
                          </i></span> 

                            <span class="views"><i class="icon-tv"></i>{{ $post->tb_posts_visitas }}</span> 

                            <span class="btn-srp "><a href="pg-category.html">{{ $post->tb_categorias_nome }}</a></span>
                        </div>

                        <div class="bottom-bar">
                            <span class="btn-srp"><a href="/post/{{ $post->tb_posts_slug }}">Leia mais...</a></span>
                        </div>

                    </figure>

                    <div class="sec-desc">

                        <header class="title">
                            <h4 class="post-title"><a href="#">{{ $post->tb_posts_titulo }}</a></h4>
                        </header>

                        <div class="meta-info">
                            <span class="author"><i class="icon-user3"></i><a href="#">{{ $post->tb_users_nome }}</a></span>
                            <span class="date-time"><i class="icon-alarm2"></i>
                                {{ date('d/m/Y H:i:s', strtotime($post->tb_post_data)) }}
                            </span>
                        </div>

                        <div class="post-desc">
                            <p>{{ strip_tags(str_limit($post->tb_posts_mensagem , 400, '...')) }}</p>
                        </div>

                    </div>
                </article>
                 <div class="divider"></div>
                 <?php $i++; ?>
                 @endforeach
            </div>
                <div>{{ $links }}</div>
        </div>

    @endif
@stop
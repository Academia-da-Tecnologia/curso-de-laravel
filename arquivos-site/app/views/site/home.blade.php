@extends('site.layout')

@section('conteudo')

<!-- Best Reviews -->
<section id="divCatReviews_1" class="cat-widget wdg-cat-reviews cat-scroll-box clearfix" data-showonscroll="true" data-animation="fadeIn">
    @include('partials/site/maisComentados')
</section>

<div class="widget-title">
    <h3><a href="#">Últimos Posts Cadastrados</a></h3>
    <span class="sub-title">Veja os últimos posts</span>
    <div class="sep-widget"></div>
</div>

<div class="color-red widget-content clearfix">
    <div>
    @foreach( $posts as $post )
        <article class="{{ oddEven( $i ) }}-item" data-showonscroll="true" data-animation="fadeIn">
            <figure class="sec-image">

                <a class="post-thumbnail">
                    {{ HTML::image( $post->tb_post_foto ) }}
                </a>

                <div class="top-bar">

                  <span class="views"><i class="icon-bubble">
                    {{ \app\models\site\PostModel::totalComentarios( $post->idPost ) }}
                  </i></span> 

                    <span class="views"><i class="icon-tv">
                        {{ $post->tb_post_visitas }}
                    </i></span> 

                    <span class="btn-srp "><a href="#">
                        {{ $post->tb_categoria_nome }}
                    </a></span>
                </div>

                <div class="bottom-bar">
                    <span class="btn-srp"><a href="/post/{{ $post->tb_post_slug }}">Leia mais...</a></span>
                </div>

            </figure>

            <div class="sec-desc">

                <header class="title">
                    <h4 class="post-title"><a href="/post/{{ $post->tb_post_slug }}">
                        {{ $post->tb_post_titulo }}
                    </a></h4>
                </header>

                <div class="meta-info">
                    <span class="author"><i class="icon-user3"></i><a href="#">
                        {{ $post->tb_user_nome }}
                    </a></span>
                    <span class="date-time"><i class="icon-alarm2"></i>
                        {{ date('d/m/Y H:i:s', strtotime( $post->tb_post_data )) }}
                    </span>
                </div>


                <div class="post-desc">
                    <p>{{ strip_tags(str_limit( $post->tb_post_mensagem,400,'...' )) }}</p>
                </div>

            </div>
        </article>
         <div class="divider"></div>
      <?php $i++; ?>
    @endforeach
    </div>
</div>
@stop
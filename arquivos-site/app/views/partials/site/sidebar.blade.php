<h2 class="hidden">Sidebar</h2>
    <section class="widget wdg-tabs" data-showonscroll="true" data-animation="fadeIn">
        <div class="widget-title clearfix">
            <h3 class="hidden">Tabs Widget</h3>
            <div class="sep-widget"></div>
        </div>

        <div class="widget-content paddingZero clearfix">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#recent" data-toggle="tab">Recentes</a></li>
                <li><a href="#popular" data-toggle="tab">Mais Vistos</a></li>
                <li><a href="#comments" data-toggle="tab">Comentados</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">


<h4 class="hidden">Recent Comments - Tab</h4>
<aside class="tab-pane animated fadeInDown active" id="recent">
    <h4 class="hidden">Posts Recentes - Tab</h4>

    <div class="wdg-classic-posts color-theme clearfix">
        <ul class="list-unstyled">
          @foreach($posts as $post)
            <li class="post-item">
                <article class="post-box clearfix">
                    <figure class="wdg-col-4 sec-image">
                        <div class="mask-background white"></div>

                        <div class="post-type anim"><i class="icon-camera2"></i></div>

                        <div class="post-thumbnail border-radius-2px">
                            {{ HTML::image($post->tb_post_thumb,null,['class' => 'border-radius-2px' ]) }}
                        </div>
                        <a href="#" class="more"></a>
                    </figure>

                    <div class="wdg-col-8 sec-title">

                        <span class="btn-srp"><a href="/categoria/{{ $post->tb_categoria_slug }}">
                            {{ $post->tb_categoria_nome }}
                        </a></span>

                        <h5><a href="/post/{{ $post->tb_post_slug }}">
                            {{ str_limit( $post->tb_post_titulo,50,'...' ) }}
                            </a>
                        </h5>

                        <div class="meta-info">

                            <span class="author"><i class="icon-user3"></i><a href="#">
                                {{ $post->tb_user_nome }}
                            </a></span>
                            <span class="date"><i class="icon-alarm2"></i>
                                {{ date('d/m/Y H:i:s', strtotime( $post->tb_post_data )) }}
                            </span>
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</aside>

<aside class="tab-pane animated fadeInDown" id="popular">
<h4 class="hidden">Popular Posts - Tab</h4>
    <div class="wdg-classic-posts color-theme clearfix">
        <ul class="list-unstyled">
        @foreach( $maisVistos as $maisVisto )
        <li class="post-item">
             
            <article class="post-box clearfix">
                <figure class="wdg-col-4 sec-image">
                    <div class="mask-background white"></div>

                    <div class="post-type anim"><i class="icon-camera2"></i></div>

                    <div class="post-thumbnail border-radius-2px">
                       {{ HTML::image($maisVisto->tb_post_thumb,null,['class' => 'border-radius-2px' ]) }}
                    </div>

                    <a href="#" class="more"></a>
                </figure>

                <div class="wdg-col-8 sec-title">

                    <span class="btn-srp"><a href="/categoria/{{ $post->tb_categoria_slug }}">
                        {{ $maisVisto->tb_categoria_nome }}
                    </a></span>

                    <h5><a href="/post/{{ $post->tb_post_slug }}" title=""> {{ str_limit( $maisVisto->tb_post_titulo, 50,'...' ) }} </a></h5>

                    <div class="meta-info">

                        <span class="author"><i class="icon-user3"></i><a href="/post/{{ $post->tb_post_slug }}">{{ $maisVisto->tb_user_nome }}</a></span>
                        <span class="date"><i class="icon-alarm2"></i>
                        {{ date('d/m/Y H:i:s',strtotime($maisVisto->tb_post_data)) }}
                        </span>
                    </div>
                </div>
            </article>
                                        
        </li>
     @endforeach
        </ul>
    </div>
</aside>


<aside class="tab-pane animated fadeInDown" id="comments">
    <h4 class="hidden">Recent Comments - Tab</h4>

    <div class="wdg-comments clearfix">
        <ul class="list-unstyled">
         @foreach($maisComentados as $maisComentado)
            <li class="post-item">
                <article class="post-box clearfix">
                    <figure class="wdg-col-4 sec-image">

                        <div class="avatar-thumbnail border-radius-2px">
                            {{ HTML::image($maisComentado->tb_post_foto) }}
                        </div>
                        <a href="#" class="more"></a>
                    </figure>

                    <div class="wdg-col-8 sec-title">
                        <div class="meta-info">
                            <span class="date-time"><i class="icon-alarm2"></i>{{ date("d/m/Y",strtotime($maisComentado->tb_post_data)) }}</span>
                        </div>

                        <div class="comment">
                        <a href="/post/{{ $post->tb_post_slug }}">
                            <a href="/post/{{ $post->tb_post_slug }}">
                                <h5>{{ $maisComentado->tb_user_nome }}</h5>
                                <span class="separator"></span>
                                <p>{{ str_limit($maisComentado->tb_post_mensagem,100,'...') }}</p>
                            </a>
                        </div>

                        <div class="leave-comment">
                            <a href="/post/{{ $post->tb_posts_slug }}#formComentarios">Deixe um comentário</a>
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
            </div>
        </div>
    </section>

    <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
        <div class="widget-title clearfix">
            <h3>Tags</h3>
            <div class="sep-widget"></div>
        </div>

        <div class="widget-content clearfix">
            <div class="tags-cloud clearfix">
                <?php arsort( $tags );  ?>
                @foreach( $tags as $tag => $value )
                    @if( $i <= 20 )
                        <a href="/tags/{{ $tag }}">{{ $tag }}
                        <span class="badge">{{ $value }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </aside>

    <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
        <div class="widget-title clearfix">
            <h3>Video</h3>
            <div class="sep-widget"></div>
        </div>

        <div class="widget-content clearfix">
            <div class="wdg-video clearfix">
                <iframe itemprop="contentURL" class="youtube-player" type="text/html" width="100%" height="200" src="http://www.youtube.com/embed/P5_Msrdg3Hk?wmode=transparent&amp;wmode=opaque" allowfullscreen="" frameborder="0"></iframe>
            </div>
        </div>
    </aside>
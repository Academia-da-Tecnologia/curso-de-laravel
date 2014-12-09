<div class="widget-title">
    <h3><a href="#">Mais Comentados</a></h3>
    <span class="sub-title">os mais comentados</span>

    <div class="sep-widget"></div>
</div>

<div class="widget-content color-theme">
    <div>
        <ul class="nav-arrows list-inline">
            <li><a href="#" class="backward"><i class="icon-arrow-left6"></i></a></li>
            <li><a href="#" class="forward"><i class="icon-arrow-right6"></i></a></li>
        </ul>
    <div class="scroll-box">
     @foreach( $maisComentados as $maisComentado )
        <div class="post-item">
            <article class="post-box clearfix">
                    <a class="post-thumbnail"> {{ HTML::image($maisComentado->tb_post_foto) }} </a>

                    <div class="top-bar">
                        <div class="review-value">
                           {{ str_limit( $maisComentado->tb_post_mensagem,65,'...' ) }}
                        </div>

                        <span class="btn-srp"><a href="/post/{{ $maisComentado->tb_post_slug }}">Leia mais</a></span>
                    </div>

                   <header class="title-bar">
                        <h4 class="post-title">
                            <a href="/post/{{ $maisComentado->tb_post_slug }}">
                                {{ str_limit($maisComentado->tb_post_titulo,35,'...') }}
                            </a>
                        </h4>

                        <div class="meta-info">
                            <span class="author"><i class="icon-user3"></i>
                            <a href="#"></a> {{ $maisComentado->tb_user_nome }} </span>
                            <span class="date-time"><i class="icon-alarm2"></i>
                                {{ date("d/m/Y H:i:s", strtotime( $maisComentado->tb_post_data )) }}
                            <span>
                            
                            
                            <span class="comments"><i class="icon-bubble"></i>
                                 {{ $maisComentado->numeroComentarios }}   
                            </span>
                        </div>

                    </header>
            </article>
        </div>     
    @endforeach
        </div>
    </div>
</div>
<section class="row footer-widgets">
    <div class="col-md-4">
        <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
            <div class="widget-title clearfix">
                <h3>Tags</h3>
                <div class="sep-widget"></div>
            </div>

            <div class="widget-content clearfix">
                <div class="tags-cloud clearfix">
                @foreach( $tags as $tag=>$value )
                    @if( $i <= 20 )
                     <a href="/tags/{{ $tag }}">{{ $tag }}<span class="badge">{{ $value }}</span></a>
                    @endif
                @endforeach    
                </div>
            </div>
        </aside>

        <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
            <div class="widget-title clearfix">
                <h3>Social Icons</h3>
                <div class="sep-widget"></div>
            </div>

            <div class="widget-content clearfix">
                <div class="social-icons white">
                    <ul class="clearfix">
                        <li class="tooltip_item fb-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="facebook">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-facebook"></i></a>
                        </li>

                        <li class="tooltip_item twitter-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="twitter">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-twitter"></i></a>
                        </li>

                        <li class="tooltip_item googleplus-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="google+">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-gplus"></i></a>
                        </li>

                        <li class="tooltip_item pinterest-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="pinterest">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-pinterest"></i></a>
                        </li>

                        <li class="tooltip_item youtube-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="youtube">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-youtube"></i></a>
                        </li>

                        <li class="tooltip_item rss-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="rss">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-rss"></i></a>
                        </li>

                        <li class="tooltip_item vk-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="vk">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-vk"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <div class="col-md-4">

        <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
            <div class="widget-title clearfix">
                <h3>Posts Mais Vistos</h3>
                <div class="sep-widget"></div>
            </div>

            <div class="widget-content clearfix">
                <div class="wdg-classic-posts color-theme clearfix">
                    <ul class="list-unstyled">
                      @foreach( $maisVistos as $maisVisto )  
                        <li class="post-item">
                            
                <article class="post-box clearfix">
                    <figure class="wdg-col-4 sec-image">
                        <div class="mask-background white"></div>

                        <div class="post-type anim"><i class="icon-camera2"></i></div>

                        <div class="post-thumbnail border-radius-2px">
                            {{ HTML::image($maisVisto->tb_post_thumb,null, array('class' => 'border-radius-2px' )) }}
                        </div>

                        <a href="#" class="more"></a>
                    </figure>

                    <div class="wdg-col-8 sec-title">
                        
                        <span class="btn-srp">
                            <a href="/categoria/{{ $maisVisto->tb_categoria_slug }}">{{ $maisVisto->tb_categoria_nome }}</a>
                        </span>    

                        <h5><a href="/post/{{ $maisVisto->tb_post_slug }}" title="">{{ str_limit($maisVisto->tb_post_titulo,50,'...') }}</a></h5>

                        <div class="meta-info">
                            
                                <span class="author"><i class="icon-user3"></i>
                                    {{ $maisVisto->tb_user_nome }}
                                </span>

                                <span class="date"><i class="icon-alarm2" ></i>
                                    {{ date('d/m/Y', strtotime($maisVisto->tb_post_data)) }}
                                </span>

                        </div>


                    </div>
            </article>
                @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>

    <div class="col-md-4">

        <aside class="widget" data-showonscroll="true" data-animation="fadeIn">
            <div class="widget-title clearfix">
                <h3>Comentários Recentes</h3>
                <div class="sep-widget"></div>
            </div>

            <div class="widget-content clearfix">
                <div class="wdg-comments clearfix">
                    <ul class="list-unstyled">
                     @foreach( $ultimosComentarios as $comentario )
                        <li class="post-item">
                            <article class="post-box clearfix">
                                <div class="wdg-col-4 sec-image">

                                    <div class="avatar-thumbnail border-radius-2px">
                                        {{ HTML::image( $comentario->tb_user_foto ) }}
                                    </div>

                                    <a href="#" class="more"></a>
                                </div>

                                <div class="wdg-col-8 sec-title">
                                    <div class="meta-info">
                                        <span class="date-time"><i class="icon-alarm2"></i>{{ date('d/m/Y H:i:s', strtotime( $comentario->tb_comentario_data )) }}</span>
                                    </div>

                                    <div class="comment">
                                        <h5>{{ $comentario->tb_user_nome }}</h5>
                                        <span class="separator"></span>
                                        <p>
                                            {{ str_limit( $comentario->tb_comentario_texto,60,'...' ) }}
                                        </p>
                                    </div>

                                    <div class="leave-comment">
                                        <a href="/post/{{ $comentario->tb_post_slug }}#formComentarios">Deixe um comentário</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

    </div>
</section>

        <section class="row footer-bottom" data-showonscroll="true" data-animation="fadeIn">
            <h3 class="hidden">Footer Bottom Links</h3>

            <div class="col-md-6">
                <ul>
                    <li><a href="pg-sample.html">About US</a></li>
                    <li><a href="pg-sample.html">Contact US</a></li>
                    <li><a href="pg-sample.html">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <p class="pull-right">&copy; Copyright 2014 Four Magazine Theme by Serpentsoft, All Rights Reserved</p>
            </div>

        </section>
<div class="btn-mobile-menu visible-sm visible-xs">
    <button type="button" class="menu-btn">
        <i class="icon-menu"></i>
        <span>Menu</span>
    </button>
</div>

<!-- Top Menu -->
<nav class="social-menu navbar">
    <h2 class="hidden">Top Navigation</h2>

    <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="social-menu-navbar-collapse" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-left visible-lg visible-md">

                <li class="color-theme active">
                    <a href="/">Home<span class="nav-line"></span></a>
                </li>

                <li class="color-theme"><a href="/contato">Entre em contato<span class="nav-line"></span></a></li>

                <li class="color-theme"><a href="/user">Registrar<span class="nav-line"></span></a></li>

                <li class="dropdown color-theme">
                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Configurações
                        <b class="caret"></b>
                        <span class="nav-line"></span>
                    </a>

                    <ul class="dropdown-menu" data-dropdownanimation="true" data-animation="fadeInLeft">
                    @if(\Auth::check())
                        <li><a href="/userEdit/{{ \Auth::user()->id }}/edit">Alterar meus dados</a></li>
                        <li><a href="/userFoto/{{ \Auth::user()->id }}/edit">Alterar minha foto</a></li>
                        <li><a href="/passwordUser/{{ \Auth::user()->id }}/edit">Alterar Senha</a></li> 
                    @else    
                        <li><a href="#" data-toggle="modal" class="text-danger" data-target="#modalLogin">Faça o login</a></li>
                    @endif    
                    </ul> 
                </li>
                 @if( !\Auth::check())
                <li class="color-theme">
                    <a href="#" data-toggle="modal" data-target="#modalLogin">Logar<span class="nav-line"></span></a>
                </li>
                @else
                    <li><a href="/logout">Logout</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right visible-lg visible-md visible-sm">

                <li class="search dropdown">
                    <div class="mask-background animated lightSpeedIn"></div>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></a>
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                                <div class="form-group">
    
                                    {{ Form::open(['role' => 'search', 'class' => 'navbar-form navbar-right', 'method' => 'POST', 'route' => 'posts.busca']) }}

                                    {{ Form::text('busca','',['class' => 'form-control', 'placeholder' => 'busca', 'required' => 'required']) }}

                                    <button type="submit" class="btn-search"><i class="icon-search"></i></button>
                                    {{ Form::close() }}

                                </div>
                        </li>
                    </ul>
                </li>

                <li class="social-icons">
                    <ul class="list-inline clearfix">

                        <li class="tooltip_item fb-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="facebook">
                            <div class="mask-background animated lightSpeedIn" data-animation="lightSpeedIn"></div>
                            <a href="#"><i class="zoc-facebook"></i></a>
                        </li>

                        <li class="tooltip_item twitter-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="twitter">
                            <div class="mask-background animated lightSpeedIn" data-animation="lightSpeedIn"></div>
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

                        <li class="tooltip_item github-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="github">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-github-circled"></i></a>
                        </li>

                        <li class="tooltip_item instagram-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="instagram">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-instagram"></i></a>
                        </li>

                        <li class="tooltip_item vk-metro-but-16" data-toggle="tooltip" data-placement="bottom" title="vk">
                            <div class="mask-background animated lightSpeedIn"></div>
                            <a href="#"><i class="zoc-vk"></i></a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
    <!-- /.navbar-collapse -->

</nav>

<!-- Breaking News -->
<section class="tkr-breaking-news hidden-xs"></section>

<!-- Site Logo -->
<header class="container header-logo">
    <div class="logo" itemscope itemtype="http://schema.org/Brand">
        Adicionar Logo aqui
    </div>

    <div class="advertise-790 visible-lg">
        Adicionar banner aqui
    </div>
</header>

<!-- #camera_wrap_1 -->
<section id="camera_wrap_2"></section>

<!-- Main Menu -->
<nav class="main-menu navbar visible-lg visible-md" data-sticky-header="true">
    <h2 class="hidden">Main Navigation</h2>

    <div class="container">
        <div class="row">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="main-menu-navbar-collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    @foreach( $categorias as $categoria )
                        <li class="dropdown color-3" >
                            <a href="/categoria/{{ $categoria->tb_categoria_slug }}">{{ $categoria->tb_categoria_nome }}
                            <span class="nav-line"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="color-theme"><a href="#"><i class="icon-shuffle"></i><span class="nav-line"></span></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>

</nav>
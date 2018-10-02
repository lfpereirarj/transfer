<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Transfer Ilha Grande') }} | @yield('title')</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer id="colophon" class="clearfix">	
			
            <div class="footer-widgets-wrapper">
                <div class="inner-wrap">
                    <div class="footer-widgets-area clearfix">
                        <div class="tg-one-fourth tg-column-1">
                            <aside id="nav_menu-2" class="widget widget_nav_menu"><h3 class="widget-title"><span>Institucional</span></h3><div class="menu-menu-institucional-rodape-container"><ul id="menu-menu-institucional-rodape" class="menu"><li id="menu-item-50" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-50"><a href="/~trans387/">Home</a></li>
            <li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="http://www.transferilhagrande.com.br/quem-somos/">Quem Somos</a></li>
            <li id="menu-item-48" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48"><a href="http://www.transferilhagrande.com.br/equipe-e-transportes/">Equipe e Transportes</a></li>
            <li id="menu-item-514" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-514"><a href="http://www.transferilhagrande.com.br/fotos-de-ilha-grande/">Fotos de Ilha Grande</a></li>
            <li id="menu-item-513" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-513"><a href="http://www.transferilhagrande.com.br/fotos-de-buzios/">Fotos de Búzios</a></li>
            <li id="menu-item-515" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-515"><a href="http://www.transferilhagrande.com.br/embarcacoes/">Embarcações</a></li>
            <li id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a href="http://www.transferilhagrande.com.br/parceiros/">Parceiros</a></li>
            </ul></div></aside>			</div>
                        <div class="tg-one-fourth tg-column-2">
                            <aside id="nav_menu-3" class="widget widget_nav_menu"><h3 class="widget-title"><span>Transfer e Tarifas</span></h3><div class="menu-menu-servicos-rodape-container"><ul id="menu-menu-servicos-rodape" class="menu"><li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-55 current_page_item menu-item-58"><a href="http://www.transferilhagrande.com.br/rio-de-janeiro-x-ilha-grande/">Transfer RJ x Ilha Grande / Ilha Grande x RJ</a></li>
            <li id="menu-item-635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-635"><a href="http://www.transferilhagrande.com.br/transfer-rj-x-angra-dos-reis-angra-dos-reis-x-rj/">Transfer RJ x Angra dos Reis / Angra dos Reis x RJ</a></li>
            <li id="menu-item-516" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-516"><a href="http://www.transferilhagrande.com.br/transfer-rio-de-janeiro-x-buzios/">Transfer Rio de Janeiro x Búzios</a></li>
            <li id="menu-item-517" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-517"><a href="http://www.transferilhagrande.com.br/transfer-ilha-grande-x-buzios/">Transfer Ilha Grande x Búzios</a></li>
            <li id="menu-item-51" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a href="http://www.transferilhagrande.com.br/tarifas/">Tarifas</a></li>
            </ul></div></aside>			</div>
                        <div class="tg-one-fourth tg-after-two-blocks-clearfix tg-column-3">
                            <aside id="nav_menu-4" class="widget widget_nav_menu"><h3 class="widget-title"><span>Contato</span></h3><div class="menu-menu-contato-rodape-container"><ul id="menu-menu-contato-rodape" class="menu"><li id="menu-item-129" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-129"><a href="http://www.transferilhagrande.com.br/fale-conosco/">Fale Conosco</a></li>
            <li id="menu-item-130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-130"><a href="http://www.transferilhagrande.com.br/pre-reserva/">Pré-Reserva</a></li>
            </ul></div></aside><aside id="text-5" class="widget widget_text">			<div class="textwidget"><strong>Informações:</strong><br>
            + 55 21 97125-3775<br>
            + 55 24 99943-2358<br><br>
            
            <strong>E-mail:</strong><br>
            reservasilhagrandetransfer@gmail.com
            
            
            </div>
                    </aside>			</div>
                        <div class="tg-one-fourth tg-one-fourth-last tg-column-4">
                            <aside id="text-8" class="widget widget_text">			<div class="textwidget"><div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/30jx6e8KIxc.js?version=42#channel=f2ebaf016907fb8&amp;origin=http%3A%2F%2Fwww.transferilhagrande.com.br" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/transferilha/" data-tabs="eventos" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=232&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftransferilha%2F&amp;locale=pt_BR&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=eventos"><span style="vertical-align: bottom; width: 232px; height: 214px;"><iframe name="f6616d7653efcc" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v2.8/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F30jx6e8KIxc.js%3Fversion%3D42%23cb%3Df4115e4b6fafb4%26domain%3Dwww.transferilhagrande.com.br%26origin%3Dhttp%253A%252F%252Fwww.transferilhagrande.com.br%252Ff2ebaf016907fb8%26relation%3Dparent.parent&amp;container_width=232&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftransferilha%2F&amp;locale=pt_BR&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false&amp;tabs=eventos" style="border: none; visibility: visible; width: 232px; height: 214px;" class=""></iframe></span></div></div>
                    </aside>			</div>
                    </div>
                </div>
            </div>
                
            <div class="footer-socket-wrapper clearfix">
                <div class="inner-wrap">
                    <div style="float:right;">
                        Desenvolvido por: <a href="http://www.blocodesign.com.br" target="blank">Bloco Design</a>
                    </div>
                    <div class="footer-socket-area">
                        Copyright © 2016 Transfer Ilha Grande x Rio de Janeiro - Todos os direitos reservado.
                    </div>
                    
                    
                </div>
            </div>			
        </footer>
    </div>
</body>
</html>

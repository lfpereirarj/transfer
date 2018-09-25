<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Transfer Ilha Grande') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vendors.min.css') }}">
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('css/gsdk-bootstrap-wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header--inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="header__logo">
                                <div class="logo">
                                    <img src="{{ asset('img/logo-transfer-ilha-grande-buzios-site-2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="header__language d-flex justify-content-end">
                                <ul class="d-flex list-unstyled justify-content-around">
                                    <li>
                                        <a class="gflag nturl alt_flag br_flag" href="">br</a>
                                    </li>
                                    <li>
                                        <a class="gflag nturl alt_flag us_flag" href="">us</a>
                                    </li>
                                    <li>
                                        <a class="gflag nturl alt_flag mx_flag" href="">es</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__menu">
                                <nav class="navbar navbar-expand-lg navbar-dark">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Home
                                                    <span class="sr-only">(current)</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="http://www.transferilhagrande.com.br/quem-somos/">Quem Somos</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Transfer</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/rio-de-janeiro-x-ilha-grande/">Transfer RJ x Ilha Grande / Ilha Grande x RJ</a>
                                                    <a class="dropdown-item"
                                                        href="http://www.transferilhagrande.com.br/transfer-rj-x-angra-dos-reis-angra-dos-reis-x-rj/">Transfer RJ x Angra dos Reis / Angra dos Reis x RJ</a>
                                                    <a class="dropdown-item"
                                                        href="http://www.transferilhagrande.com.br/transfer-ilha-grande-x-buzios/">Transfer Ilha Grande x Búzios</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="http://www.transferilhagrande.com.br/tarifas/">Tarifas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="http://www.transferilhagrande.com.br/equipe-e-transportes/">Equipe e Transportes</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Galeria de Fotos</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/fotos-de-ilha-grande/">Fotos de Ilha Grande</a>
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/fotos-de-buzios/">Fotos de Búzios</a>
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/embarcacoes/">Embarcações</a>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="http://www.transferilhagrande.com.br/parceiros/">Parceiros</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Contato</a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/fale-conosco/">Fale Conosco</a>
                                                    <a class="dropdown-item" href="http://www.transferilhagrande.com.br/pre-reserva/">Pré-Reserva </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="content">
            @yield('content')            
        </main>
    </div>
    <script src="{{ asset('js/vendors.min.js') }}"></script> 
    <script src="{{ asset('js/moment.js') }}"></script> 
    <script src="{{ asset('js/main.min.js') }}"></script> 
    @yield('script')
</body>

</html>

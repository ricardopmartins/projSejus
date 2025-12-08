<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Layout')</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/styleDefault.css') }}?v={{ file_exists(public_path('assets/css/styleDefault.css')) ? filemtime(public_path('assets/css/styleDefault.css')) : time() }}">
    <link rel="stylesheet"
        href="{{asset('assets/css/styleLayout.css')}}?v={{ file_exists(public_path('assets/css/styleLayout.css')) ? filemtime(public_path('assets/css/styleLayout.css')) : time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/images/logoNova.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    @yield('styles')
</head>

<body>
    <nav class="teste">
        <div class="layout-container">
            <a class="logo" href="{{Route('homePage')}}"><img src="{{asset('assets/images/logoNova.png')}}" alt=""
                    width="60px" height="60px"></a>

            <div class="layout-links">
                <a class="link-layout" href="{{Route('homePage')}}">Home</a>
                <a class="link-layout" href="{{Route('gamesPage')}}">Catalogo</a>
                <a class="link-layout" href="{{Route('aboutUs')}}">Sobre Nós</a>
            </div>

            @auth
            <div class="dropdown custom-dropdown">
                <a class="link-layout-profile" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/profileicon.png') }}" alt="imageProfile">
                </a>
                <div class="dropdown-menu mt-custom" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item customhover" href="{{Route('myProfile')}}">Meu Perfil</a>
                    <a class="dropdown-item customhover" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair / Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endauth
            @guest
            <a class="login" href="{{ route('login') }}" class="">Login</a>
            @endguest
        </div>
    </nav>
    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer_container">
            <div class="footer_column">
                <h4>Loja</h4>
                <a href="http://127.0.0.1:8000/about">
                    <p>Sobre nós</p>
                </a>
                <p>Produtos</p>
                <p>Contato</p>
            </div>
            <div class="footer_column">
                <h4>Ajuda</h4>
                <p>FAQ</p>
                <p>Suporte</p>
                <p>Política de Privacidade</p>
            </div>
            <div class="footer_column">
                <h4>Redes Sociais</h4>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://x.com" target="_blank"><i class="fab fa-x"></i></a>
                    <a href="https://tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <a href="https://discord.com" target="_blank"><i class="fab fa-discord"></i></a>
                    <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="https://twitch.tv" target="_blank"><i class="fab fa-twitch"></i></a>
                </div>
            </div>
        </div>


        <div class="footer_copy">
            ©Copyright - <a href=""> SejusPlay Template </a> by <a href="">RJ</a>
        </div>
    </footer>

</body>

</html>

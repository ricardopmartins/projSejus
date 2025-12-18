@extends('layout')
@section('styles')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=favorite,settings" />
    <style>
        body {
            font-size: 1.1rem;
        }

        .small,
        small {
            font-size: 0.95rem !important;
        }

        .form-control {
            font-size: 1.1rem;
        }

        .material-symbols-outlined {
            font-size: 24px !important;
        }

        /* Classe auxiliar para hover cinza nas abas inativas */
        .hover-bg-gray:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }
    </style>
</head>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.ajax-link');
        const contentDiv = document.getElementById('dynamic-content');
        const spinner = document.getElementById('loading-spinner');

        // Função para atualizar o visual das abas
        function updateActiveTab(clickedLink) {
            // Remove estilos ativos de todas as abas
            document.querySelectorAll('.ajax-tab').forEach(tab => {
                tab.classList.remove('bg-primary', 'text-white', 'active-tab');
                tab.classList.add('bg-white', 'text-dark', 'hover-bg-gray');

                // Ajusta a cor do texto do link
                const link = tab.querySelector('a');
                if (link) {
                    link.classList.remove('text-white');
                    link.classList.add('text-dark');
                }
            });

            // Adiciona estilos ativos na aba pai do link clicado
            const parentTab = clickedLink.closest('.ajax-tab');
            if (parentTab) {
                parentTab.classList.remove('bg-white', 'text-dark', 'hover-bg-gray');
                parentTab.classList.add('bg-primary', 'text-white', 'active-tab');
            }

            clickedLink.classList.remove('text-dark');
            clickedLink.classList.add('text-white');
        }

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                //referencia o link clicado
                updateActiveTab(this);

                let url = this.getAttribute('href');

                contentDiv.classList.add('d-none');
                spinner.classList.remove('d-none');

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    contentDiv.innerHTML = html;
                    window.history.pushState({ path: url }, '', url);
                })
                .catch(error => {
                    console.error('Erro:', error);
                    contentDiv.innerHTML = '<p class="text-danger">Ocorreu um erro ao carregar o conteúdo.</p>';
                })
                .finally(() => {
                    spinner.classList.add('d-none');
                    contentDiv.classList.remove('d-none');
                });
            });
        });

        window.addEventListener('popstate', function() {
            location.reload();
        });
    });
</script>
@endsection
@section('content')

<body class="bg-light">
    <div class="container mt-5 mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="fw-bold mb-1">Meu Perfil</h2>
                <p class="text-secondary">Gerencie suas informações pessoais</p>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0 overflow-hidden" style="background: #123A8C">

                    <div class="row g-0 border-bottom" id="abas-container">

                        <div class="col-4 p-3 d-flex justify-content-center align-items-center gap-2 border-end ajax-tab position-relative
                            {{ request()->routeIs('biblioteca') ? 'bg-primary text-white' : 'bg-white hover-bg-gray text-dark' }}">

                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 50 50"
                                fill="currentColor">
                                <path
                                    d="M 5 5 C 2.25 5 0 7.25 0 10 L 0 39 C 0 41.75 2.25 44 5 44 L 21 44 C 22.664063 44 24 45.351563 24 47 C 24 47.308594 24.144531 47.601563 24.386719 47.789063 C 24.632813 47.980469 24.949219 48.046875 25.25 47.96875 C 25.511719 47.902344 25.738281 47.734375 25.875 47.5 C 25.960938 47.347656 26.003906 47.175781 26 47 C 26 45.351563 27.335938 44 29 44 L 45 44 C 47.75 44 50 41.75 50 39 L 50 10 C 50 7.25 47.75 5 45 5 L 29 5 C 27.367188 5 25.914063 5.8125 25 7.03125 C 24.085938 5.8125 22.632813 5 21 5 Z M 5 7 L 21 7 C 22.667969 7 24 8.332031 24 10 L 24 43.125 C 23.152344 42.464844 22.148438 42 21 42 L 5 42 C 3.332031 42 2 40.667969 2 39 L 2 10 C 2 8.332031 3.332031 7 5 7 Z M 29 7 L 45 7 C 46.667969 7 48 8.332031 48 10 L 48 39 C 48 40.667969 46.667969 42 45 42 L 29 42 C 27.851563 42 26.847656 42.464844 26 43.125 L 26 10 C 26 8.332031 27.332031 7 29 7 Z">
                                </path>
                            </svg>
                            <a href="{{Route('biblioteca')}}"
                                class="text-decoration-none fw-medium ajax-link stretched-link {{ request()->routeIs('biblioteca') ? 'text-white' : 'text-dark' }}">Biblioteca</a>
                        </div>

                        <div class="col-4 p-3 d-flex justify-content-center mb-0 align-items-center gap-2 border-end ajax-tab position-relative
                            {{ request()->routeIs('wishlist') ? 'bg-primary text-white' : 'bg-white hover-bg-gray text-dark' }}">

                            <span class="material-symbols-outlined">favorite</span>
                            <a href="{{Route('wishlist')}}"
                                class="text-decoration-none fw-medium ajax-link stretched-link {{ request()->routeIs('wishlist') ? 'text-white' : 'text-dark' }}">Wishlist</a>
                        </div>

                        <div class="col-4 p-3 d-flex justify-content-center align-items-center gap-2 ajax-tab position-relative
                            {{ request()->routeIs('myProfile') ? 'bg-primary text-white' : 'bg-white hover-bg-gray text-dark' }}">

                            <span class="material-symbols-outlined">settings</span>
                            <a href="{{Route('myProfile')}}"
                                class="text-decoration-none fw-bold ajax-link stretched-link {{ request()->routeIs('myProfile') ? 'text-white' : 'text-dark' }}">Account
                                Details</a>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <div class="col-md-12 mx-auto">
                            <div id="dynamic-content">

                                @yield('profile_content')
                            </div>
                        </div>

                        <div id="loading-spinner" class="text-center d-none py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
@endsection

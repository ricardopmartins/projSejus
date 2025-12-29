@extends('layout')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}">
@endsection

@section('content')
<body>
    {{-- Banner --}}
    <section class="banner">
        <div class="banner-overlay"></div>
        <img src="{{ asset('assets/images/bannerHome.png') }}" alt="Banner promocional" class="banner-img">
    </section>

    <h1>HOME</h1>
    <p> In eget pharetra elit, non placerat leo. Ut malesuada lectus at augue commodo lobortis. Phasellus tempus, lorem porttitor tincidunt euismod, arcu neque aliquet enim, nec consectetur tellus nulla quis sem.</p>

    {{-- Exibição dos Jogos em Carrossel --}}
    <section class="container my-5">
        <div id="promoCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($slides as $index => $group)
                    @php
                        $principal = $group->first();
                        $extras = $group->skip(1);
                    @endphp

                    <div class="carousel-item {{  $index == 0 ? 'active' : ''}}">
                        <div class="row g-5">
                            {{-- Banner Principal --}}
                            <div class="col-md-8 ">
                                <div class="rounded-5">
                                    <a href="{{ route('jogo.show', $principal->id_jogo) }}">
                                        <img src="{{ $principal->imagem }}" class="img-fluid rounded-3 w-100 h-100 object-fit-cover" alt="{{ $principal->nome_jogo }}">
                                    </a>
                                </div>
                                <div class="carousel-caption  bg-opacity-100 rounded p-3 text-start">
                                    <h5 class="text-white fw-bold fs-3">{{ $principal->nome_jogo }}</h5>

                                    <div class="d-flex align-items-center gap-2">
                                        {{-- Caixa Vemelha % desconto --}}
                                        <span class="badge bg-danger fs-5 shadow-sm">-{{ $principal->discount }}%</span>

                                        {{-- Preços empilhados --}}
                                        <div class="d-flex flex-column">
                                            <span class="text-white text-decoration-line-through fs-7">R$ {{ number_format($principal->valor, 2, ',', '.') }}</span>
                                            <span class="fw-bold text-white fs-4">R$ {{ number_format($principal->final_price, 2, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Dois banners menores à direita --}}
                            <div class="col-md-4 d-flex flex-column gap-4">
                                @foreach ($extras as $extra)
                                    <div class="position-relative flex-fill">
                                        <a href="{{ route('jogo.show', $extra->id_jogo) }}">
                                            <img src="{{ $extra->imagem }}" class="img-fluid rounded object-fit-cover flex-fill" alt="{{ $extra->nome_jogo }}">
                                        </a>
                                        <div class="position-absolute bottom-0 text-white small-banner-caption">
                                            <h6 class="fw-bold mb-1">{{ $extra->nome_jogo }}</h6>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="badge bg-danger">-{{ $extra->discount }}%</span>
                                                <span class="fw-bold text-white fs-4">R$ {{ number_format($extra->final_price, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-1">
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev" >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/></svg>
                </button>
            </div>
            <div class="col-1">
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M439.1 297.4C451.6 309.9 451.6 330.2 439.1 342.7L279.1 502.7C266.6 515.2 246.3 515.2 233.8 502.7C221.3 490.2 221.3 469.9 233.8 457.4L371.2 320L233.9 182.6C221.4 170.1 221.4 149.8 233.9 137.3C246.4 124.8 266.7 124.8 279.2 137.3L439.2 297.3z"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Exibição dos Jogos em Cards --}}
    <section class="container my-5">
        <div class="row">
            @foreach ($jogos as $jogo)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <x-game-card
                        :id="$jogo->id_jogo"
                        :title="$jogo->nome_jogo"
                        :platform="$jogo->plataforma"
                        :price="$jogo->final_price"
                        :original_price="$jogo->valor"
                        :discount="$jogo->discount"
                        :img="$jogo->imagem ?? asset('assets/images/defaultGame.jpg')"
                    />
                </div>
            @endforeach
        </div>
    </section>
</body>

@endsection

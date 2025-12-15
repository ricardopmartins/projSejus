@extends('layout')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styleHome.css') }}">
@endsection

@section('content')
<body>
    <section class="banner">
        <div class="banner-overlay"></div>
        <img src="{{ asset('assets/images/bannerHome.png') }}" alt="Banner promocional" class="banner-img">
    </section>

    <h1>HOME</h1>
    <p> In eget pharetra elit, non placerat leo. Ut malesuada lectus at augue commodo lobortis. Phasellus tempus, lorem porttitor tincidunt euismod, arcu neque aliquet enim, nec consectetur tellus nulla quis sem.</p>

    <section class="container my-5">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($promocoes as $index => $jogo)
              <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ $jogo->imagem }}" class="d-block w-100" style="height: 800px; object-fit: cover;" alt="{{ $jogo->nome_jogo }}">
                <div class="carousel-caption d-none d-md-block bg-white bg-opacity-35 rounded p-3">
                  <h5 class="text-black">{{ $jogo->nome_jogo }}</h5>
                  <p>
                    <span class="text-decoration-line-through text-muted">R$ {{ number_format($jogo->valor, 2, ',', '.') }}</span>
                    <span class="fw-bold text-success ms-2">R$ {{ number_format($jogo->final_price, 2, ',', '.') }}</span>
                  </p>
                  <a href="{{ route('homePage') }}" class="btn btn-primary">Ver promoção</a>
                </div>
              </div>
            @endforeach
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
    </section>


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

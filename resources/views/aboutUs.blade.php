@extends('layout')

@section('title', 'Sobre Nós')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/styleAboutUs.css') }}">
@endsection

@section('content')
<section class="hero container my-0">
    {{-- Hero Section --}}
    <section class=" py-5 text-white text-center">
        <div class="container">
            <h1 class="fw-bold">Sobre Nós</h1>
            <p class="lead">A melhor loja online para gamers apaixonados</p>
        </div>
    </section>

    {{-- Missão, Visão e Valores --}}
    <section class="py-5">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="bi bi-bullseye fs-1 text-primary"></i>
                <h4 class="fw-bold mt-3 fs-2">Missão</h4>
                <p class="fs-5">Oferecer os melhores jogos e promoções com qualidade e confiança.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-eye fs-1 text-success"></i>
                <h4 class="fw-bold mt-3 fs-2">Visão</h4>
                <p class="fs-5">Ser referência nacional em vendas de jogos digitais.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-heart fs-1 text-danger"></i>
                <h4 class="fw-bold mt-3 fs-2">Valores</h4>
                <p class="fs-5">Paixão por games, transparência e respeito aos nossos clientes.</p>
            </div>
        </div>
    </section>

    {{-- Nossa História --}}
    <section class="py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/nossa_equipe.jpg') }}" class="img-fluid rounded shadow" alt="Nossa equipe">
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold">Nossa História</h3>
                <p class="fs-5">
                    Fundada em 2025, a SejusPlay nasceu com o objetivo de trazer praticidade e economia para os gamers.
                    Desde o início, nossa missão foi simplificar o acesso a jogos digitais, oferecendo uma plataforma segura, moderna e repleta de oportunidades para quem busca diversão sem abrir mão da qualidade. <br><br>

                    Com uma equipe apaixonada por tecnologia e entretenimento, crescemos lado a lado com nossa comunidade, sempre atentos às tendências do mercado e às necessidades dos jogadores. Ao longo da nossa trajetória, investimos em inovação, promoções exclusivas e um catálogo cada vez mais diversificado, capaz de atender a diferentes estilos e preferências. <br><br>

                    Mais do que uma loja, a SejusPlay se tornou um espaço de confiança e proximidade, onde cada cliente é parte essencial da nossa história. Continuamos firmes no propósito de transformar experiências digitais em momentos inesquecíveis, reforçando diariamente nosso compromisso com transparência, respeito e paixão pelo universo gamer.

                </p>
            </div>
        </div>
    </section>

    {{-- Diferenciais --}}
    <section class="py-5">
        <div class="container text-center" >
            <h3 class="fw-bold mb-4">Por que escolher a SejusPlay?</h3>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card shadow-sm h-100 diferenciais-card">
                        <div class="card-body">
                            <i class="bi bi-currency-dollar fs-1 text-success"></i>
                            <h5 class="fw-bold mt-3 fs-2">Preços Imbatíveis</h5>
                            <p class="fs-5">Descontos exclusivos e promoções semanais.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 diferenciais-card">
                        <div class="card-body">
                            <i class="bi bi-shield-check fs-1 text-primary"></i>
                            <h5 class="fw-bold mt-3 fs-2">Segurança</h5>
                            <p class="fs-5">Compra protegida e suporte dedicado.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 diferenciais-card">
                        <div class="card-body">
                            <i class="bi bi-controller fs-1 text-danger"></i>
                            <h5 class="fw-bold mt-3 fs-2">Variedade</h5>
                            <p class="fs-5">Catálogo com centenas de jogos para todos os estilos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection

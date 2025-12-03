@extends('layout')

@section('title', 'Sobre Nós')

@section('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/styleAboutUs.css') }}">
@endsection

@section('content')
<body>
    <section id="banner">
        <div class="container">
            <div class="banner_headline">
                <h1>Sobre Nós</h1>

                <h1>A melhor loja online</h1>

                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet ligula in eros pharetra porttitor. In suscipit, lacus et fringilla feugiat, ante erat ultricies diam, vitae congue dolor nulla nec tellus.
                Ullam justo tellus, interdum id aliquam et, aliquet eget massa. Curabitur nec massa porta, ullamcorper urna lacinia,  auctor nisi.</h2>
            </div>
        </div>
    </section>
</body>
@endsection



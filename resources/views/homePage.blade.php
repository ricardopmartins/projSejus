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


    <section class="game-strip">
        <x-game-card
            title="L.A. Noire"
            platform="Windows"
            price="47.99"
            discount="40"
            image="{{ asset('assets/images/L.A.Noire_Capa.jpg') }}"
        />

        <x-game-card
            title="RoboCop: Rogue City"
            platform="Windows"
            price="150.99"
            discount="20"
            image="{{ asset('assets/images/roboCopCapa.jpg') }}"
        />

        <x-game-card
            title="SWAT 4"
            platform="Windows"
            price="50.00"
            discount="24"
            image="{{ asset('assets/images/SWAT_4_capa.webp') }}"
        />

        <x-game-card
            title="Sleeping Dogs Definitive Edition"
            platform="Windows"
            price="8.39"
            discount="85"
            image="{{ asset('assets/images/SleepingDogsCapa.jpeg') }}"
        />

    </section>
</body>

@endsection

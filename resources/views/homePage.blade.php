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
        <div class="game-card">
            <img src="{{ asset('assets/images/L.A.Noire_Capa.jpg') }}" alt="L.A.Noire">
            <h3>L.A.Noire</h3>
            <p class="platform">Windows</p>
            <p class="price">R$ 47,99 <span class="discount">-40%</span></p>
            <button>Comprar</button>
        </div>

        <div class="game-card">
            <img src="{{ asset('assets/images/roboCopCapa.jpg') }}" alt="RoboCop">
            <h3>RoboCop: Rogue City</h3>
            <p class="platform">Windows</p>
            <p class="price">R$ 150,99 <span class="discount">-20%</span></p>
            <button>Comprar</button>
        </div>

        <div class="game-card">
            <img src="{{ asset('assets/images/SWAT_4_capa.webp') }}" alt="SWAT_4">
            <h3>SWAT 4</h3>
            <p class="platform">Windows</p>
            <p class="price">R$ 50,00 <span class="discount">-24%</span></p>
            <button>Comprar</button>
        </div>

        <div class="game-card">
            <img src="{{ asset('assets/images/SleepingDogsCapa.jpeg') }}" alt="Sleeping_Dogs">
            <h3>Sleeping Dogs</h3>
            <p class="platform">Windows</p>
            <p class="price">R$ 55,99 <span class="discount">-85%</span></p>
            <button>Comprar</button>
        </div>
    </section>
</body>

@endsection

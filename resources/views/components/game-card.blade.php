@props([
    'title' => 'Título do jogo',
    'platform' => 'Plataforma',
    'price' => 0.00,
    'discount' => null,
    'image' => asset('assets/images/defaultGame.jpg'),
])

<div class="game-card">
    <img src="{{ $image }}" alt="{{ $title }}">
    <h3>{{ $title ?: 'Título do jogo' }}</h3>
    <p class="platform">{{ $platform ?: 'Plataforma'}}</p>
    <p class="price">
        R$ {{ number_format((float)$price, 2, ',', '.') }}
        @if($discount)
        <span class="discount">-{{ $discount }}%</span></p>
        @endif
    <button>Comprar</button>
</div>

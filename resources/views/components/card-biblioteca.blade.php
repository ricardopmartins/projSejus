@props([
    'title' => 'Título do jogo',
    'platform' => 'Plataforma',
    'price' => 0.00,
    'original_price' => null,
    'discount' => null,
    'image' => asset('assets/images/defaultGame.jpg'),
])

<div class="game-card">
    <img src="{{$img}}" alt="{{$title}}">
    <h3>{{$title ?: 'Titulo do jogo'}}</h3>
    <p class="plataform">{{$plataform ?:'Plataforma'}}</p>

    <p class="price">
        @if($discount)
            <span style="text-decoration: line-through; color: #AAA;">
                R$ {{ number_format((float)$original_price, 2, ',', '.') }}
            </span>

            <span style="margin-left: 8px;">
                R$ {{ number_format((float)$price, 2, ',', '.') }}
            </span>

            <span class="discount">-{{ $discount }}%</span>
        @else
            R$ {{ number_format($price, 2, ',', '.') }}
        @endif
    </p>
</div>

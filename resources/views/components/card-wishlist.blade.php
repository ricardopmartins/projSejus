@props([
    'title' => 'Título do jogo',
    'plataform' => 'Plataforma',
    'price' => 0.00,
    'original_price' => null,
    'discount' => null,
    'img' => asset('assets/images/defaultGame.jpg'),
])

<div class="card mb-3 shadow-sm">
    <div class="d-flex align-items-center p-3">

        <img class="rounded me-3" style="width: 90px; height: 150px; object-fit: cover;"src="{{$img}}" alt="{{$title}}">

        <div class="flex-grow-1">

            <h3 class="">{{$title ?: 'Titulo do jogo'}}</h3>
            <p class="">{{$plataform ?:'Plataforma'}}</p>

            <p class="">
                @if($discount)
                <span class="text-muted small me-2" style="text-decoration: line-through">
                    R$ {{ number_format((float)$original_price, 2, ',', '.') }}
                </span>

                <span class="fw-bold text-danger me-2">
                    R$ {{ number_format((float)$price, 2, ',', '.') }}
                </span>

                <span class="fw-bold text-primary">-{{ $discount }}%</span>
                @else
                R$ {{ number_format($price, 2, ',', '.') }}
                @endif
            </p>
        </div>
        <div class="ms-auto d-flex align-items-center">
            <button type="button" class="btn btn-outline-success me-2">Comprar</button>
            <button type="button" class="btn btn-outline-danger"><i class="bi bi-heart"></i></button>
        </div>
    </div>
</div>

@props([

'title' => 'Título do jogo',
'plataform' => 'Plataforma',
'price' => 0.00,
'original_price' => null,
'discount' => null,
'img' => asset('assets/images/defaultGame.jpg'),

])

{{-- <div class="card box shadow-sm mb-3" >
    <div class="bg-secondary bg-gradiant pt-1">

        <h4 class="card-subtitle text-center ">{{$plataform}}</h4>
    </div>
    <a href="">

        <img class="teste card-img-top rounded-botto mx-auto d-block mt-0" src="{{$img}}" alt="{{$title}}">
    </a>
    <div class="card-body">

        <h3 class="card-title">{{$title ?: 'Titulo do jogo'}}</h3>
        <h5 class="card-subtitle">Valor Pago R$ {{$price}}</h5>

    </div>
</div> --}}
<div class="card h-100 border-0 shadow-sm overflow-hidden group-hover-effect mb-3">
    <div class="position-relative">
        <a href="#">
            <img src="{{ $img }}" class="card-img-top object-fit-cover mx-auto mt-0" style="height: 200px; width: 100%;" alt="{{ $title }}">
        </a>

        <span class="badge bg-dark position-absolute top-0 start-0 m-2 shadow-sm">
            {{ $plataform }}
        </span>

        @if($discount)
            <span class="badge bg-danger position-absolute top-0 end-0 m-2 shadow-sm">
                -{{ $discount }}%
            </span>
        @endif
    </div>

    <div class="card-body d-flex flex-column">
        <h5 class="card-title text-truncate" title="{{ $title }}">
            {{ $title }}
        </h5>

        <div class="mt-auto">
            @if($original_price && $original_price > $price)
                <small class="text-muted text-decoration-line-through">
                    R$ {{ number_format($original_price, 2, ',', '.') }}
                </small>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <span class="h5 mb-0 fw-bold text-success">
                    R$ {{ number_format($price, 2, ',', '.') }}
                </span>

                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                    Ver
                </a>
            </div>
        </div>
    </div>
</div>

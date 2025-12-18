@props([
'id',
'title' => 'Título do jogo',
'plataform' => 'Plataforma',
'price' => 0.00,
'original_price' => null,
'discount' => null,
'img' => asset('assets/images/defaultGame.jpg'),

])

@php
    $isInWishlist = false;
    $hasGame = false;

    if (Auth::check()) {
        $user = Auth::user();

        $isInWishlist = $user->hasInWishlist($id);
        $hasGame = $user->hasGame($id);
    }
@endphp

<div class="card h-100 border-0 shadow-sm overflow-hidden group-hover-effect mb-3" style="background: #123A8C">
    <div class="position-relative">
        <a href="{{ route('jogo.show', $id) }}">
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
        <h5 class="card-title text-truncate text-white" title="{{ $title }}">
            {{ $title }}
        </h5>

        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-end">

                <div class="d-flex flex-column">

                    @if($original_price && $original_price > $price)
                    <small class="text-muted text-decoration-line-through" style="color: white !important">
                        R$ {{ number_format($original_price, 2, ',', '.') }}
                    </small>
                    @endif

                    <span class="h5 mb-0 fw-bold text-success" style="color: #40c057 !important">
                        R$ {{ number_format($price, 2, ',', '.') }}
                    </span>
                </div>

                <div>

                    <a href="{{ route('jogo.show', $id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2">
                        Ver
                    </a>

                    @if ($hasGame)

                    @elseif ($isInWishlist)
                        <form action="{{ route('wishlist.remove', $id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" title="Remover da Lista de Desejos">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('wishlist.add', $id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" title="Adicionar à Lista de Desejos">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                            </button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

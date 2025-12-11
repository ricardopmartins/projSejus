@props([
'id' => null,
'title' => 'Título do jogo',
'platform' => 'Plataforma',
'price' => 0.00,
'original_price' => null,
'discount' => null,
'img' => asset('assets/images/defaultGame.jpg'),
])

<div class="card h-100 border-0 shadow-sm overflow-hidden group-hover-effect mb-3">
    <div class="position-relative">
        <a href="#">
            <img src="{{ $img }}" class="card-img-top object-fit-cover mx-auto mt-0" style="height: 200px; width: 100%;" alt="{{ $title }}">
        </a>

        <span class="badge bg-dark position-absolute top-0 start-0 m-2 shadow-sm">
            {{ $platform }}
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

                <a href="{{ route('admin.jogos.edit', ['jogo' => $id]) }}" class="btn btn-sm btn-warning">Editar</a>
                <form
                    action="{{ route('admin.jogos.destroy', ['jogo' => $id]) }}" method="POST"
                    style="display: inline";>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

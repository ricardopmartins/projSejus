@props([
    'id',
    'title' => 'Titulo do jogo',
    'plataform' => 'Plataforma',
    'price' => 0.00,
    'original_price' => null,
    'discount' => null,
    'img' => asset('assets/images/defaultGame.jpg'),
])

<div class="card mb-3 rounded-lg hover-shadow border-0" style="transition: all 0.3s ease-in-out;">
    <div class="d-flex align-items-center p-3">

        <img class="rounded me-4 shadow-sm" style="width: 125px; height: 150px; object-fit: cover;" src="{{ $img }}" alt="{{ $title }}">

        <div class="d-flex flex-column align-top">
            <span class="mb-1 fw-bold text-dark fs-4">{{ $title ?: 'Titulo do jogo' }}</span>
            <span class="small text-muted mb-0 fs-6">{{ $plataform ?: 'Plataforma' }}</span>
        </div>

        <div class="flex-grow-1"></div>

        <div class="ms-3 d-flex flex-column align-items-end justify-content-between" style="height: 120px;">

            <div class="text-end">
                @if($original_price && $original_price > $price)
                    <small class="text-muted text-decoration-line-through d-block fs-5">
                        R$ {{ number_format($original_price, 2, ',', '.') }}
                    </small>
                @endif
                <span class="h6 mb-0 fw-bold fs-4 @if($original_price && $original_price > $price) text-success @else text-dark @endif">
                    R$ {{ number_format($price, 2, ',', '.') }}
                </span>
            </div>

            <div class="d-flex justify-content-end mt-auto">

                <a href="{{ route('jogo.show', $id) }}"
                    class="btn btn-sm btn-outline-primary rounded-pill px-3 me-2"
                    style="min-width: 80px;">
                        Ver
                </a>

                <form id="remove-form-{{ $id }}" action="{{ route('carrinho.remove', $id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                            class="btn btn-sm btn-danger rounded-pill px-3"
                            style="min-width: 100px;"
                            data-bs-toggle="modal"
                            data-bs-target="#confirmRemoveModal-{{ $id }}">
                        Remover
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmRemoveModal-{{ $id }}" tabindex="-1" aria-labelledby="confirmRemoveModalLabel-{{ $id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRemoveModalLabel-{{ $id }}">Confirmação de Remoção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja remover {{ $title }} do seu carrinho?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button"
                        class="btn btn-danger"
                        onclick="document.getElementById('remove-form-{{ $id }}').submit();">
                    Sim, Remover
                </button>
            </div>
        </div>
    </div>
</div>

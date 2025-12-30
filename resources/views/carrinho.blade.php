@extends('layout')

@section('title', 'Carrinho')
@section('content')
<div class="container my-5">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold m-0">Meu Carrinho</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{route('gamesPage')}}">
                <button class="btn btn-outline-success text-bg-primary" style="background: #123A8C">Continuar Comprando</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card p-4 mb-4 border-0 rounded-3" style="background: #123A8C;">
                <div class="row">
                    <div class="col-lg-8" >
                        <h3 class="mb-3 text-white">Pedido</h3>
                    </div>
                    <div class="col-auto ms-auto">
                        <form action="{{route('carrinho.clear')}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill px-3">
                                <i class="fa-solid fa-trash" style="color: white"></i>
                                Limpar Carrinho
                            </button>
                        </form>
                    </div>
                </div>
                    <hr>

                <div class="d-grid gap-2">
                    @foreach ($jogos as $jogo)
                        <x-card-carrinho
                            :id="$jogo->id_jogo"
                            :title="$jogo->nome_jogo"
                            :plataform="$jogo->plataforma"
                            :price="$jogo->final_price"
                            :original_price="$jogo->valor"
                            :discount="$jogo->discount"
                            :img="$jogo->imagem ?? asset('assets/images/defaultGame.jpg')"
                        />
                    @endforeach
                </div>
            </div>

            <div>
                <div class=" p-3 rounded " style="background: #123A8C">
                    <h5 class="text-white fw-bold">Informações Importantes:</h5>
                    <ul class="text-white">
                        <li>Todos os itens são entregues apenas de forma digital por download ou créditos direto na conta e estão sujeitos à política de reembolso.</li>
                        <li>Verifique os requisitos de sistema na página de cada jogo e os Termos de Uso antes de realizar a compra.</li>
                        <li>Alguns itens possuem limite temporário de compra e podem levar em torno de 2 dias para poder fazer uma nova compra do mesmo item.</li>
                        <li>Inserir produtos ou cupons no carrinho não garante a reserva das promoções ativas.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-4 mb-4">
            <div class="p-3 rounded" style="background: #123A8C">
                <div class="box-header mb-3">

                    <h5 class="text-white fw-bold">Formas de Pagamento:</h5>
                </div>
                <hr>
                <form action="">
                    <div>
                        <input type="radio" name="pagamento" id="credito_avista" class="me-2">
                        <h4 class="fw-bold mb-0">Cartão de Credito - À Vista</h4>
                        <p class="text-decoration-none">Pague à vista com cartão de crédito.</p>
                        <i class="fa-brands fa-cc-visa fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-mastercard fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-amex fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-paypal fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-discover fa-2x me-2 text-white" style="font-size: 38px"></i>
                    <hr>
                    </div>
                    <div>
                        <input type="radio" name="pagamento" id="credito_parcelado" class="me-2">
                        <h4 class="fw-bold mb-0">Cartão de Credito - Parcelado</h4>
                        <p class="text-decoration-none">Pague em até 6x sem juros ou de 7 a 12x com juros.</p>
                        <i class="fa-brands fa-cc-visa fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-mastercard fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-amex fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-paypal fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <i class="fa-brands fa-cc-discover fa-2x me-2 text-white" style="font-size: 38px"></i>
                        <hr>
                    </div>
                    <div>
                        <input type="radio" name="pagamento" id="credito_parcelado" class="me-2">
                        <h4 class="fw-bold mb-0">Pix</h4>
                        <img src="{{asset('assets/images/pix-banco-central-seeklogo.png')}}" alt="Pix" width="100" height="45"/>
                        <hr>
                    </div>
                    <div>
                        <input type="radio" name="pagamento" id="credito_parcelado" class="me-2">
                        <h4 class="fw-bold mb-0">Boleto</h4>
                        <img width="64" height="64" src="https://img.icons8.com/hatch/64/boleto-bankario.png" alt="boleto-bankario"/>
                        <hr>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="card shadow-sm p-4 mb-3 border-0" style="background: #123A8C">
                    <h3 class="mb-3 text-white">Resumo do Pedido</h3>
                    <div class="row">
                        <div class="col-lg-8 mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white fs-5">Subtotal</span>

                            </div>
                        </div>

                        <div class="col-auto ms-auto">
                            <span class="text-white fs-5">R$ {{ number_format($subtotal, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <span class="text-white">Desconto</span>
                            <div class="d-flex justify-content-between mb-2">
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <span class="text-white fs-5">R$ {{ number_format($descontoTotal, 2, ',', '.') }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <span class="text-white fs-5">Total</span>
                            <div class="d-flex justify-content-between mb-2">
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <span class="text-white fs-5">R$ {{ number_format($totalFinal, 2, ',', '.') }}</span>
                        </div>
                    </div>

                    <form action="{{ route('carrinho.confirmCompra') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success w-100 text-bg-primary border-0" style="background: #28A745">Finalizar Compra</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

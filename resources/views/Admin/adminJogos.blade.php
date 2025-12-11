@extends('layout')

@section('title', 'adminPage')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <h1>Painel de Administração - Jogos</h1>

        {{-- Botão adiconar jogo --}}
        <a href="{{ route('admin.jogos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Jogo</a>

        {{-- Lista de jogos cadastrados --}}
            <section>
                <div class="row row-cols-md-3 py-6">
                    @foreach ($jogos as $jogo)
                        <div class="col-6 mb-3">
                            <x-admin-card
                                :id="$jogo->id_jogo"
                                :title="$jogo->nome_jogo"
                                :platform="$jogo->plataforma"
                                :price="$jogo->final_price"
                                :original_price="$jogo->valor"
                                :discount="$jogo->discount"
                                :img="$jogo->imagem ?? asset('assets/images/defaultGame.jpg')"
                            />
                        </div>
                    @endforeach
                </div>
            </section>
    </div>
@endsection

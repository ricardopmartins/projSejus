@extends('layout')

@section('title', $jogo->nome_jogo)

@section('content')

    @php
        $isInWishlist = false;
        $hasGame = false;
        if (Auth::check())
        {
            $user = Auth::user();
            $isInWishlist = $user->hasInWishlist($jogo->id_jogo);
            $hasGame = $user->hasGame($jogo->id_jogo);
        }
    @endphp

    <div class="container mt-4 mb-4">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold">{{$jogo->nome_jogo}}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-lg overflow-hidden rounded-3 mb-2">

                    <img
                    src="{{$jogo->imagem}}"
                    alt="{{$jogo->nome_jogo}}"
                    class="img-fluid mx-auto my-auto w-100 object-fit-cover">
                </div>

                <div class="row g-2" style="margin-left: 0px !important;">
                    <div class="col-3"><img class="img-fluid rounded opacity-50" src="{{ $jogo->imagem }}" alt="{{ $jogo->nome_jogo }}"></div>
                    <div class="col-3"><img class="img-fluid rounded opacity-50" src="{{ $jogo->imagem }}" alt="{{ $jogo->nome_jogo }}"></div>
                    <div class="col-3"><img class="img-fluid rounded opacity-50" src="{{ $jogo->imagem }}" alt="{{ $jogo->nome_jogo }}"></div>
                    <div class="col-3"><img class="img-fluid rounded opacity-50" src="{{ $jogo->imagem }}" alt="{{ $jogo->nome_jogo }}"></div>
                </div>
                <div class="mt-4">
                    <h4 class="fw-bold">Sobre o Jogo</h4>
                    <div>
                        <p>{{$jogo->description}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" style="">
                <div class="p-4 rounded-3 mb-3 shadow-sm" style="background: #123a8c">
                    @if($jogo->discount > 0)
                        <div class="mb-3">
                            <span class="badge bg-danger rounded-pill px-3 py-2 fw-bold" style="color: #fff">-{{ $jogo->discount }}% OFF</span>
                        </div>

                        <div class="d-flex flex-column align-content-start">
                            <div class="mb-0">
                                <span class="text-white-50 text-decoration-line-trrough h5 opacity-75" style="color: #fff !important">R$ {{ number_format($jogo->valor, 2, ',', '.') }}
                                </span>
                            </div>

                            <div class="mb-2">
                                <span class="h2 fw-bold text-success" style="color: #fff !important">R$ {{ number_format($jogo->final_price, 2, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @else
                        <span class="h2 fw-bold text-success">
                            R$ {{ number_format($jogo->valor, 2, ',', '.') }}
                        </span>
                    @endif

                    <div class="fw-bold rounded-2 bg-body-secondary align-items-center align-content-center p-2" style="background: #0D2C6B !important">

                        {{$jogo->plataforma}}
                    </div>

                    <div class="d-flex gap-2 mt-3" >

                        @if (!$hasGame)
                        <form action="{{route('carrinho.add', $jogo->id_jogo)}}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 rounded-2 fw-bold fs-5 d-flex align-items-center me-2" style="padding: 7px 14px; background: #57FF71">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABC0lEQVR4nNWUQWrCQBiFv9IWddFF6AEqhUK3gniGpgV7ki49g+QQRRDqCbJ04d4LBFeSdFGli26sCGpK4AUCTdMZSYr94F8kef97M8OfgSMjVlmzzzQPqgjYZpo/gcsDA26BRlGQL4Nejmn8Q6WcAwEQKSiXezXNgVPLgCc9BwrL5QSYSZiEmR7RBfCmb11+oSehbxHg6f0EAxxgBeyAa4OAJrDWJLYxZCAjz0A7knaIBS01vQP1Al1HK092cIUlU4MJSqtva578aEsD42TlL0DNNuBZBmONbqk4ujo2wA0VcAZ8WJx/fMgl+AgsqgyonAfgVTejW4LuG1Fm22EJur8PcNUcAncl6P4xX78RkD47z3P/AAAAAElFTkSuQmCC" alt="cart">Comprar
                            </button>
                        </form>
                        @else
                        <div>
                            <span>Já possui uma chave desse jogo</span>
                        </div>
                        <div>
                            <button class="border-0 rounded-2 fw-bold fs-5 d-flex align-items-center me-2" style="padding: 7px 14px; background: #57FF71">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABC0lEQVR4nNWUQWrCQBiFv9IWddFF6AEqhUK3gniGpgV7ki49g+QQRRDqCbJ04d4LBFeSdFGli26sCGpK4AUCTdMZSYr94F8kef97M8OfgSMjVlmzzzQPqgjYZpo/gcsDA26BRlGQL4Nejmn8Q6WcAwEQKSiXezXNgVPLgCc9BwrL5QSYSZiEmR7RBfCmb11+oSehbxHg6f0EAxxgBeyAa4OAJrDWJLYxZCAjz0A7knaIBS01vQP1Al1HK092cIUlU4MJSqtva578aEsD42TlL0DNNuBZBmONbqk4ujo2wA0VcAZ8WJx/fMgl+AgsqgyonAfgVTejW4LuG1Fm22EJur8PcNUcAncl6P4xX78RkD47z3P/AAAAAElFTkSuQmCC" alt="cart">Comprar

                            </button>
                        </div>

                        @endif

                        @if ($isInWishlist)
                        <div>

                            <form action="{{ route('wishlist.remove', $jogo->id_jogo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" title="Remover da Lista de Desejos" style="padding: 7px 14px">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @else
                            <div>
                                <form action="{{ route('wishlist.add', $jogo->id_jogo) }}" method="POST" class="d-inline" style="padding: 7px 14px">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" title="Adicionar à Lista de Desejos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="p-3 rounded-3 mb-3" style="background: #123a8c">
                    <div class="d-flex align-content-lg-start mb-2">
                        <span class="fw-bold small text-uppercase opacity-75">Regiões Disponíveis</span>
                    </div>
                        <p class="mb-0 small">Brasil, Chile, Colômbia, Mexico e Peru</p>
                </div>
                <div class="p-3 rounded-3 mb-3" style="background: #123a8c">
                    <div class="">
                        <div>
                            <span class="d-block fw-bold small text-uppercase">Lançamento: <span> xx/xx/xxxx</span></span>

                        </div>
                        <div class="mt-2">
                            <span class="d-block small text-uppercase">Desenvolvedor:  <span>xxxxxxxxxxxxxx</span></span>

                        </div>
                        <div class="mt-2">
                            <span class="d-block small text-uppercase mb-1">Categorias/Gênero</span>
                            @if ($jogo->JogosGenero->isNotEmpty())
                                @foreach ($jogo->JogosGenero as $jogo_genero)
                                    @if($jogo_genero->genero)
                                        <span class="badge bg-light text-dark border rounded-pill me-1 mb-1">
                                            {{ $jogo_genero->genero->nome }}
                                        </span>
                                    @endif
                                @endforeach
                                @else
                                    <span class="text-muted small">Nenhuma categoria definida</span>
                            @endif
                        </div>
                        <div class="mt-2">
                            <span>Idioma</span>
                            <div>
                                <ul>
                                    <li class="mt-1">
                                        <span class="mt-2">Ingles</span>
                                    </li>
                                    <li class="mt-1">
                                        <span class="mt-2">Portugues</span>
                                    </li>
                                    <li class="mt-1">
                                        <span class="mt-1">Espanhol</span>
                                    </li>
                                    <li class="mt-1">
                                        <span class="mt-1">Coreano</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



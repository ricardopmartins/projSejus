<link rel="stylesheet" href="{{asset(" assets/css/style_card_biblioteca.css")}}">
<div class="mb-5 text-center text-md-start">
    <h3 class="h3 mb-2 fw-bold">Minha Biblioteca</h3>
    <p class="text-muted">Seus jogos e conteúdos adquiridos</p>
</div>

    <div class="row row-cols-md-3 ">

        @foreach ($jogos as $jogo)
        <div class="col-sm-6{{-- col-4  col-lg-4 d-flex align-items-stretch--}}">

            <div class="">
                <x-card-biblioteca :title="$jogo->nome_jogo" :plataform="$jogo->plataforma" :price="$jogo->valor"
                    :img="$jogo->imagem ?? 'assets/images/defaultGame.jpg'" />
            </div>

        </div>
        @endforeach

    </div>
    </div>
</section>

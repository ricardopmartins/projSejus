<div class="mb-5 text-center text-md-start text-white">
    <h3 class="h3 mb-2 text-white">Lista de Desejos</h3>
    <p class="text-muted text-white" style="color: white !important">Seus futuros jogos e conteudos</p>
</div>
@section('title', 'Wishlist')
<section class="game-strip">
    @foreach ($jogos as $jogo)

        <x-card-wishlist
            :id="$jogo->id_jogo"
            :title="$jogo->nome_jogo"
            :plataform="$jogo->plataforma"
            :price="$jogo->valor"
            :img="$jogo->imagem ?? ('assets/images/defaultGame.jpg')"
        />

    @endforeach
</section>

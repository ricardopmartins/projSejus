<div class="mb-5 text-center text-md-start">
    <h3 class="h3 mb-2">Lista de Desejos</h3>
    <p class="text-muted">Seus futuros jogos e conteudos</p>
</div>
<section class="game-strip">
    @foreach ($jogos as $jogo)

        <x-card-wishlist
            :title="$jogo->nome_jogo"
            :plataform="$jogo->plataforma"
            :price="$jogo->valor"
            :img="$jogo->imagem ?? ('assets/images/defaultGame.jpg')"
        />

    @endforeach
</section>

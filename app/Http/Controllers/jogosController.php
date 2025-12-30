<?php
namespace App\Http\Controllers;

use App\Models\Jogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JogosController extends Controller
{

    public function home()
    {
        $jogos = Jogos::all()->map(function ($jogo) {
            $jogo->imagem = $jogo->image_path
                ? Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->addMinutes(5))
                : asset('assets/images/defaultGame.jpg');
            return $jogo;
        });

        $promocoes = Jogos::where('discount', '>=', 50)->get()->map(function ($jogo) {
            $jogo->imagem = $jogo->image_path ? Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->addMinutes(5)) : asset('assets/images/defaultGame.jpg');
            return $jogo;
        });

        // Agrupa em blocos de 3 (1 principal + 2 extras)
        $slides = $promocoes->chunk(3);

        // Carrega todos os jogos com seus gêneros + trata imagem
        $jogos = Jogos::with('JogosGenero.genero') ->get() ->map(function ($jogo) { $jogo->imagem = $jogo->image_path ? Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->addMinutes(5)) : asset('assets/images/defaultGame.jpg'); return $jogo; });

        // Jogos Ação
        $jogosAcao = $jogos->filter(function ($jogo) {
            return $jogo->JogosGenero->contains(function ($jg) {
                return $jg->genero && $jg->genero->nome_genero === 'Ação';
            });
        });

        $jogosFps = $jogos->filter(function ($jogo) {
            return $jogo->JogosGenero->contains(function ($jg) {
                return $jg->genero && $jg->genero->nome_genero === 'FPS (Tiro em 1ª Pessoa)';
            });
        });

        $jogosPolicial = $jogos->filter(function ($jogo) {
            return $jogo->JogosGenero->contains(function ($jg) {
                return $jg->genero && $jg->genero->nome_genero === 'Policial';
            });
        });


        return view('homePage', [
            'jogosAcao' => $jogosAcao,
            'jogosFps' => $jogosFps,
            'jogosPolicial' => $jogosPolicial,
            'slides' => $slides,
        ]);

    }

    public function catalogo()
    {
        $jogos = Jogos::all();

        $jogos->map(function ($jogo) {
            if ($jogo->image_path) {
                $jogo->imagem = Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->add(5, 'minutes'));
            } else {
                $jogo->imagem = asset('assets/images/defaultGame.jpg');
            }
            return $jogo;
        });

        return view('gamesPage', ['jogos' => $jogos]);

    }
    public function show($id)
    {
        $jogo = Jogos::with('JogosGenero.genero')->findOrFail($id);

        if ($jogo->image_path) {
            $jogo->imagem = Storage::disk('s3')
            ->temporaryUrl($jogo->image_path, \Carbon\Carbon::now()->addMinutes(5));
        } else {
            $jogo->imagem = asset('assets/images/defaultGame.jpg');
        }

        return view('Jogos.show', compact('jogo'));


    }
}


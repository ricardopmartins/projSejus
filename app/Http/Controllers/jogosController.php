<?php
namespace App\Http\Controllers;

use App\Models\Jogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JogosController extends Controller
{

    public function index()
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

        return view('homePage', ['jogos' => $jogos, 'promocoes' => $promocoes]);

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
        $jogo = Jogos::findOrFail($id);

        if ($jogo->image_path) {
        $jogo->imagem = \Illuminate\Support\Facades\Storage::disk('s3')
            ->temporaryUrl($jogo->image_path, \Carbon\Carbon::now()->addMinutes(5));
        } else {
            $jogo->imagem = asset('assets/images/defaultGame.jpg');
        }

        return view('Jogos.show', compact('jogo'));


    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Enderecos;
use App\Models\Meus_Jogos;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class userControler extends Controller
{
    public function store(Request $request){

        $user = new User();
        $endereco= new Enderecos();

        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->save();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->password = Hash::make($request->password);
        $user->data_nascimento = $request->idade;
        $user->id_endereco = $endereco->id;
        // Preenchendo Parte tabela endereços

        $user->save();
        return redirect()->route('login');
    }

    public function authenticate(Request $request) {
        $credenciais = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('myProfile');
        } else {
            return redirect()->back()->withErrors(['login' => 'Login ou Senha Incorretos'])
            ->withInput();
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('homePage');
    }

    // Return das views de perfil
    public function myprofile(Request $request)
    {
        if($request->ajax()){
            $user = Auth::user();
            return view('Perfil.content.myprofile_content', compact('user'));
        }

        if(Auth::check()){
            $user = Auth::user();

            return view('Perfil.myprofile', compact('user'));
        }
        return view('Perfil.myprofile');
    }

     public function biblioteca(Request $request){
        $user = Auth::user();

        $dados = [];
        if($request->ajax()){

            return view('Perfil.content.biblioteca_content', compact('dados'));
        }


        $jogosModel = new Meus_Jogos();
        $jogos = $jogosModel->getJogosByUserId($user->user_id);
        $jogos->map(function($jogo){
            if($jogo->image_path){
                $jogo->imagem = Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->add(5, 'minutes'));
            }else{
                $jogo->imagem = asset('assets/images/defaultGame.jpg');
            }
            return $jogo;
        });
        // dd($jogos);
        return view('Perfil.biblioteca', ['jogos'=> $jogos]);
    }

    public function wishlist(Request $request){

        $user = Auth::user();

        if($request->ajax()){
            return view('Perfil.content.wishlist_content', compact('dados'));
        }
        $jogosModel = new Wishlist();
        $jogos = $jogosModel->getJogosByUserId($user->user_id);
        $jogos->map(function($jogo){
            if($jogo->image_path){
                $jogo->imagem = Storage::disk('s3')->temporaryUrl($jogo->image_path, Carbon::now()->add(5, 'minutes'));
            }else{
                $jogo->imagem = asset('assets/images/defaultGame.jpg');
            }
            return $jogo;
        });
        // dd($jogo);
        return view('Perfil.wishlist', ['jogos'=>$jogos]);
    }

    public function baseperfil(){
        return view('Perfil.basePerfil');
    }

    public function registerPage(){
        return view('registerPage');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\sitecontroler;
use App\Models\Enderecos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userControler extends Controller
{
    public function myprofile()
    {
    return view('myprofile');
    }
    // Função Cadastrar Usuario
    public function registerPage(){
        return view('registerPage');
    }

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

        $user->save();
        return redirect()->route('login');
    }
    // Função Autenticar Usuario
    public function authenticate(Request $request) {
        $credenciais = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect('/myprofile');
        } else {
            return redirect()->back()->withErrors('error', 'Login ou Senha Incorretos');
        }
    }
}


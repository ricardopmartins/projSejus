<?php

namespace App\Http\Controllers;

use App\Http\Controllers\sitecontroler;
use App\Models\Enderecos;
use App\Models\User;
use Illuminate\Http\Concerns\InteractsWithInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

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
    public function alterdados(){
        $user = User::all(auth());
        return view('myprofile', compact('user'));
    }
}

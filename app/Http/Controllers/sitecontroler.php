<?php

namespace App\Http\Controllers;

use App\Models\Enderecos;
use App\Models\User;
use App\Models\Usuarios;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class sitecontroler extends Controller
{
    public function index()
    {
        return view('homePage');
    }
    public function about()
    {
        return view('aboutUs');
    }
    public function games()
    {
        return view('gamesPage');
    }
    public function login()
    {
        return view('loginPage');
    }
    public function register()
    {
        return view('registerPage');
    }
    public function layout()
    {
        return view('layout');
    }
    public function myprofile()
    {
        return view('myprofile');
    }
    // Função Cadastrar Usuario
    public function registerPage(){
        return view('registerPage');
    }
    public function biblioteca(){
        return view('biblioteca');
    }
    public function wishlist(){
        return view('wishlist');
    }
}

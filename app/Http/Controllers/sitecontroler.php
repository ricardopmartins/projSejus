<?php

namespace App\Http\Controllers;


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
    // Função Cadastrar Usuario
    public function registerPage(){
        return view('registerPage');
    }
}

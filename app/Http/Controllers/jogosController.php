<?php
namespace App\Http\Controllers;

use App\Models\Jogos;

class JogosController extends Controller
{
    public function index()
    {
        $jogos = Jogos::all();
        return view('homePage', compact('jogos'));
    }
}


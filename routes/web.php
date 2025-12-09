<?php

use App\Http\Controllers\userControler;
use App\Http\Controllers\sitecontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogosController;

// -- Rotas Publicas
Route::get('/', [JogosController::class, 'index'])->name('homePage');
Route::get('/layout', [sitecontroler::class, 'layout'])->name('layout');
Route::get('/about', [sitecontroler::class, 'about'])->name('aboutUs');

// Lista de Jogos/Catalago
Route::get('/games', [sitecontroler::class, 'games'])->name('gamesPage');
Route::get('/games/{id}', [sitecontroler::class, 'show']);
Route::get('/carrinho',[sitecontroler::class, 'carrinho'])->name('carrinho');

// -- Autenticação (Login, Registro e Logout)
Route::get('/login', [sitecontroler::class, 'login'])->name('login');
Route::post('/login', [userControler::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [userControler::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){

    Route::get('/myprofile', [userControler::class, 'myprofile'])->name('myProfile');
    Route::get('/myprofile/wishlist', [userControler::class, 'wishlist'])->name('wishlist');
    Route::get('/myprofile/biblioteca', [userControler::class, 'biblioteca'])->name('biblioteca');
    Route::get('/baseperfil', [userControler::class, 'baseperfil'])->name('baseperfil');
});

Route::get('/registerPage', [userControler::class, 'registerPage'])->name('registerPage');
Route::post('/registerPage', [userControler::class, 'store']);


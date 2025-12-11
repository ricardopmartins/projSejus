<?php

use App\Http\Controllers\wishlistControler;
use App\Http\Controllers\bibliotecaControler;
use App\Http\Controllers\userControler;
use App\Http\Controllers\sitecontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogosController;
use App\Http\Controllers\AdminJogosController;

// -- Rotas Publicas
Route::get('/', [JogosController::class, 'index'])->name('homePage');
Route::get('/layout', [sitecontroler::class, 'layout'])->name('layout');
Route::get('/about', [sitecontroler::class, 'about'])->name('aboutUs');

// Lista de Jogos/Catalago
Route::get('/catalogo', [jogosController::class, 'catalogo'])->name('gamesPage');
Route::get('/games/{id}', [sitecontroler::class, 'show']);
Route::get('/carrinho',[sitecontroler::class, 'carrinho'])->name('carrinho');

// -- Autenticação (Login, Registro e Logout)
Route::get('/login', [sitecontroler::class, 'login'])->name('login');
Route::post('/login', [userControler::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [userControler::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){

    Route::get('/myprofile', [userControler::class, 'myprofile'])->name('myProfile');
    Route::get('/myprofile/wishlist', [wishlistControler::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add/{id_jogo}', [wishlistControler::class, 'add'])
        ->name('wishlist.add')
        ->middleware('auth');
    Route::delete('/wishlist/remove/{id_jogo}', [wishlistControler::class, 'remove'])
        ->name('wishlist.remove')
        ->middleware('auth');
    Route::get('/myprofile/biblioteca', [bibliotecaControler::class, 'biblioteca'])->name('biblioteca');
    Route::get('/baseperfil', [userControler::class, 'baseperfil'])->name('baseperfil');
});

Route::get('/registerPage', [userControler::class, 'registerPage'])->name('registerPage');
Route::post('/registerPage', [userControler::class, 'store']);

// Rota da Administração
Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/jogos', [AdminJogosController::class, 'index'])->name('jogos.index');
    Route::get('/jogos/create', [AdminJogosController::class, 'create'])->name('jogos.create');
    Route::post('/jogos', [AdminJogosController::class, 'store'])->name('jogos.store');
    Route::get('/jogos/{jogo}/edit', [AdminJogosController::class, 'edit'])->name('jogos.edit');
    Route::put('/jogos/{jogo}', [AdminJogosController::class, 'update'])->name('jogos.update');
    Route::delete('/jogos/{jogo}', [AdminJogosController::class, 'destroy'])->name('jogos.destroy');
});

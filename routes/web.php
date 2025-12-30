<?php

use App\Http\Controllers\carrinhoControler;
use App\Http\Controllers\wishlistControler;
use App\Http\Controllers\bibliotecaControler;
use App\Http\Controllers\userControler;
use App\Http\Controllers\sitecontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jogosController;
use App\Http\Controllers\AdminJogosController;

// -- Rotas Publicas
Route::get('/', [JogosController::class, 'home'])->name('homePage');
Route::get('/layout', [sitecontroler::class, 'layout'])->name('layout');
Route::get('/about', [sitecontroler::class, 'about'])->name('aboutUs');
Route::get('/catalogo', [jogosController::class, 'catalogo'])->name('gamesPage');

Route::get('/games/{id}', [jogosController::class, 'show'])->name('jogo.show');

// -- Rotas do Carrinho
Route::get('/carrinho',[carrinhoControler::class, 'index'])
    ->name('carrinho')
    ->middleware('auth');
Route::post('carrinho/add/{id_jogo}', [carrinhoControler::class, 'add'])
    ->name('carrinho.add')
    ->middleware('auth');
Route::delete('carrinho/remove/{id_jogo}', [carrinhoControler::class, 'remove'])
    ->name('carrinho.remove')
    ->middleware('auth');
Route::delete('carrinho/clear', [carrinhoControler::class, 'clearCarrinho'])
    ->name('carrinho.clear')
    ->middleware('auth');
Route::get('carrinho/somaPrecoTotal', [carrinhoControler::class, 'somaPrecoTotal'])
    ->name('carrinho.somaPrecoTotal')
    ->middleware('auth');
Route::get('carrinho/calcularDescontoTotal', [carrinhoControler::class, 'calcularDescontoTotal'])
    ->name('carrinho.calcularDescontoTotal')
    ->middleware('auth');
Route::get('carrinho/calcularSubTotal', [carrinhoControler::class, 'calcularSubTotal'])
    ->name('carrinho.calcularSubTotal')
    ->middleware('auth');
Route::post('carrinho/confirmCompra', [carrinhoControler::class, 'confirmCompra'])
    ->name('carrinho.confirmCompra')
    ->middleware('auth');

// -- Autenticação (Login, Registro e Logout)
Route::get('/login', [sitecontroler::class, 'login'])->name('login');
Route::post('/login', [userControler::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [userControler::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){

    // Rotas
    Route::get('/myprofile/wishlist', [wishlistControler::class, 'wishlist'])->name('wishlist');
    Route::get('/myprofile', [userControler::class, 'myprofile'])->name('myProfile');
    Route::get('/myprofile/biblioteca', [bibliotecaControler::class, 'biblioteca'])->name('biblioteca');
    Route::get('/baseperfil', [userControler::class, 'baseperfil'])->name('baseperfil');

    // Função alterar dados do usuário
    Route::put('/myprofile/update', [userControler::class, 'update'])->name('myProfile.update');

    // Função Adicionar e Remover jogo da Wishlist
    Route::post('/wishlist/add/{id_jogo}', [wishlistControler::class, 'add'])
    ->name('wishlist.add')
    ->middleware('auth');
    Route::delete('/wishlist/remove/{id_jogo}', [wishlistControler::class, 'remove'])
    ->name('wishlist.remove')
    ->middleware('auth');
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

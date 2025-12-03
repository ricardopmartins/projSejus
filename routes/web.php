<?php

use App\Http\Controllers\userControler;
use App\Http\Controllers\sitecontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogosControler;

Route::get('/', [sitecontroler::class, 'index'])->name('homePage');
Route::get('/layout', [sitecontroler::class, 'layout'])->name('layout');
Route::get('/about', [sitecontroler::class, 'about'])->name('aboutUs');
Route::get('/games', [sitecontroler::class, 'games'])->name('gamesPage');
Route::get('/games/{id}', [sitecontroler::class, 'show']);

// Login/Autenticação Routes
Route::get('/login', [sitecontroler::class, 'login'])->name('login');
Route::post('/login', [userControler::class, 'authenticate'])->name('authenticate');


Route::middleware(['auth'])->group(function(){

    Route::get('/myprofile', [sitecontroler::class, 'myprofile'])->name('myProfile');
    Route::get('/myprofile/wishlist', [sitecontroler::class, 'wishlist'])->name('wishlist');
    Route::get('/myprofile/biblioteca', [sitecontroler::class, 'biblioteca'])->name('biblioteca');

});

Route::get('/registerPage', [sitecontroler::class, 'registerPage'])->name('registerPage');
Route::post('/registerPage', [userControler::class, 'store']);


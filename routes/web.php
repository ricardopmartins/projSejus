<?php

use App\Http\Controllers\userControler;
use App\Http\Controllers\sitecontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogosControler;

Route::get('/games', [JogosControler::class, 'index']);
Route::get('/layout', [sitecontroler::class, 'layout'])->name('layout');
Route::get('/', [sitecontroler::class, 'home'])->name('homePage');
Route::get('/about', [sitecontroler::class, 'about'])->name('aboutUs');
Route::get('/games', [sitecontroler::class, 'games'])->name('gamesPage');
Route::get('/games/{$id}', [sitecontroler::class, 'show']);

// Login/Autenticação Routes
Route::get('/login', [sitecontroler::class, 'login'])->name('login');
Route::post('/login', [userControler::class, 'authenticate'])->name('authenticate');

Route::get('/myprofile', [sitecontroler::class, 'myprofile'])->name('myProfile');

Route::get('/registerPage', [sitecontroler::class, 'registerPage'])->name('registerPage');
Route::post('/registerPage', [userControler::class, 'store']);


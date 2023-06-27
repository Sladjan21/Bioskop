<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('landing', function () {
    return view('landing');
});

Route::get('filmovi', function () {
    return view('filmovi');
});

Route::get('kontakt', function () {
    return view('kontakt');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/proveraZaIspis', [App\Http\Controllers\HomeController::class, 'provera'])->name('proveraZaIspis');

Route::get('/prikaziSveFilmove', [App\Http\Controllers\FilmoviController::class, 'prikaziSveFilmove'])->name('prikaziSveFilmove');

Route::get('/pregledKarte/{id}', [App\Http\Controllers\FilmoviController::class, 'pregledKarte'])->name('pregledKarte');

Route::post('/skiniTXT', [App\Http\Controllers\FajlController::class, 'skiniTXT'])->name('skiniTXT');

Route::get('/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/adminFilmovi', [App\Http\Controllers\AdminController::class, 'filmovi'])->name('adminFilmovi');

Route::get('/adminBrisi/{id}', [App\Http\Controllers\AdminController::class, 'brisiKorisnika'])->name('adminBrisi');

Route::get('/adminDodajFilmPrikaz', [App\Http\Controllers\AdminController::class, 'dodajFilmPrikaz'])->name('dodajFilmPrikaz');

Route::post('/adminDodajFilm', [App\Http\Controllers\AdminController::class, 'dodajFilm'])->name('dodajFilm');

Route::get('/adminBrisiFilm/{id}', [App\Http\Controllers\AdminController::class, 'brisiFilm'])->name('adminBrisiFilm');

Route::get('/adminIzmeniFilm/{id}', [App\Http\Controllers\AdminController::class, 'izmeniFilm'])->name('adminIzmeniFilm');

Route::post('/adminIzmeniFilm', [App\Http\Controllers\AdminController::class, 'izmeniFilmFunkcija'])->name('adminIzmeniFilm');

Route::get('/brisiVreme/{idVreme}', [App\Http\Controllers\AdminController::class, 'izbrisiVreme'])->name('izbrisiVreme');

Route::get('/izmeniVreme/{idVreme}', [App\Http\Controllers\AdminController::class, 'izmeniVreme'])->name('izmeniVreme');


Route::get('proba', function () {
    return view('proba');
});
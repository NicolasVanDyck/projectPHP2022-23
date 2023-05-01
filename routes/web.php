<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','home')->name('home');
Route::view('contact','contact')->name('contact');

//Gedeelte voor member (middleware(['auth']->) moet hier nog aan toegevoegd worden, nog niet gedaan voor testdoeleinden)
Route::middleware(['auth'])->prefix('member')->name('member/')->group(function() {
//Route::prefix('member')->name('member/')->group(function() {
   Route::view('dashboard', 'member/dashboard')->name('dashboard');
   Route::view('deelname_groep', 'member/deelname_groep')->name('deelname_groep');
   Route::view('galerij', 'member/galerij')->name('galerij');
   Route::view('individuele_trajecten', 'member/individuele_trajecten')->name('individuele_trajecten');
   Route::view('kleding', 'member/kleding')->name('kleding');
   Route::view('profile.show', 'profile.show')->name('profile.show');
//   Nog bekijken of dit kan/klopt; voorlopig in commentaar

});

if (auth()->check() && auth()->user()->is_admin == true)
    Route::view('admin/welkom', 'admin/welkom')->name('welkom');

//Route::middleware(['auth','admin'])->prefix('member')->name('member/')->group(function() { (uit comment halen om authenticatie op te zetten)
//Nog middleware aanmaken OF via het 'is_admin'-attribuut werken om de 'BEHEREN' knop zichtbaar te maken in het ledenoverzicht van routes.
Route::prefix('admin')->name('admin/')->group(function() {
    Route::view('aanwezighedenbeheer', 'admin/aanwezighedenbeheer')->name('aanwezighedenbeheer');
    Route::view('fotobeheer', 'admin/fotobeheer')->name('fotobeheer');
    Route::view('galerijbeheer', 'admin/galerijbeheer')->name('galerijbeheer');
    Route::view('kleding_bestellingen', 'admin/kleding_bestellingen')->name('kleding_bestellingen');
    Route::view('kledingbeheer', 'admin/kledingbeheer')->name('kledingbeheer');
    Route::view('ledenbeheer', 'admin/ledenbeheer')->name('ledenbeheer');
    Route::view('trajectbeheer', 'admin/trajectbeheer')->name('trajectbeheer');
    Route::view('webtekstbeheer', 'admin/webtekstbeheer')->name('webtekstbeheer');
    Route::view('admin/welkom', 'admin/welkom')->name('welkom');
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('member/dashboard');
    })->name('dashboard');
});

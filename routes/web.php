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

//Registerpagina uitschakelen door om te leiden naar loginpagina
Route::get('register', function () { return redirect()->route('login');});

//Voor de bezoekers
Route::view('/','home')->name('home');
//Nog bekijken i.v.m. contactformulier. Misschien moet dit een andere methode zijn dan view() (post() bv.)
Route::view('contact','contact')->name('contact');

//Voor de leden
Route::middleware(['auth'])->prefix('member/')->group(function() {
    Route::get('dashboard', function() { return view('member/dashboard');})->name('dashboard');
    Route::get('deelname_groep', function() { return view('member/deelname_groep');})->name('deelname_groep');
    Route::get('galerij', function() { return view('member/galerij');})->name('galerij');
    Route::get('individuele_trajecten', function() { return view('member/individuele_trajecten');})->name('individuele_trajecten');
    Route::get('kleding', function() { return view('member/kleding');})->name('kleding');
    Route::get('profile.show', function() { return view('profile.show');})->name('profile.show');
});

//Voor de admins
Route::middleware(['auth','admin'])->prefix('admin')->group(function() {
    Route::get('aanwezighedenbeheer', function() { return view('admin/aanwezighedenbeheer');})->name('aanwezighedenbeheer');
    Route::get('fotobeheer', function() { return view('admin/fotobeheer');})->name('fotobeheer');
    Route::get('galerijbeheer', function() { return view('admin/galerijbeheer');})->name('galerijbeheer');
    Route::get('kleding_bestellingen', function() { return view('admin/kleding_bestellingen');})->name('kleding_bestellingen');
    Route::get('kledingbeheer', function() { return view('admin/kledingbeheer');})->name('kledingbeheer');
    Route::get('ledenbeheer', function() { return view('admin/ledenbeheer');})->name('ledenbeheer');
    Route::get('trajectbeheer', function() { return view('admin/trajectbeheer');})->name('trajectbeheer');
    Route::get('webtekstbeheer', function() { return view('admin/webtekstbeheer');})->name('webtekstbeheer');
    Route::get('welkom', function() { return view('admin/welkom');})->name('welkom');
});

Route::get('/test', function () {
    return view('test');
});

// TODO: Moet er nog 'admin' middleware toegevoegd worden hieronder? Is reeds aangemaakt, maar staat niet hieronder! Tests lukken nog, is dit nodig?
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('member/dashboard');
    })->name('dashboard');
});

<?php

use App\Http\Controllers\MailController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Route;
use Laravel\Dusk\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



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


//Voor de bezoekers
Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('home');
    }
})->name('home');

//Registerpagina uitschakelen door om te leiden naar loginpagina
Route::get('register', function () {
    return redirect()->route('login');
});

//Nog bekijken i.v.m. contactformulier. Misschien moet dit een andere methode zijn dan view() (post() bv.)
Route::view('contact', 'contact')->name('contact');

//Voor de leden
Route::middleware(['auth'])->prefix('member/')->group(function () {
//    Route::get('dashboard', function() { return view('member/dashboard');})->name('dashboard');
    Route::get('dashboard', [App\Http\Controllers\Member\StravaController::class, 'getUserData'])->name('dashboard');
    Route::get('deelname_groep', function () {
        return view('member/deelname_groep');
    })->name('deelname_groep');
    Route::get('galerij', function () {
        return view('member/galerij');
    })->name('galerij');
    Route::get('individuele_trajecten', function () {
        return view('member/individuele_trajecten');
    })->name('individuele_trajecten');
    Route::get('kleding', function () {
        return view('member/kleding');
    })->name('kleding');
    Route::get('profile.show', function () {
        return view('profile.show');
    })->name('profile.show');
});

//Voor de admins
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('aanwezighedenbeheer', function () {
        return view('admin/aanwezighedenbeheer');
    })->name('aanwezighedenbeheer');
    Route::get('fotobeheer', function () {
        return view('admin/fotobeheer');
    })->name('fotobeheer');
    Route::get('galerijbeheer', function () {
        return view('admin/galerijbeheer');
    })->name('galerijbeheer');
    Route::get('kleding_bestellingen', function () {
        return view('admin/kleding_bestellingen');
    })->name('kleding_bestellingen');
    Route::get('kledingbeheer', function () {
        return view('admin/kledingbeheer');
    })->name('kledingbeheer');
    Route::get('ledenbeheer', function () {
        return view('admin/ledenbeheer');
    })->name('ledenbeheer');
    Route::get('trajectbeheer', function () {
        return view('admin/trajectbeheer');
    })->name('trajectbeheer');
    Route::get('webtekstbeheer', function () {
        return view('admin/webtekstbeheer');
    })->name('webtekstbeheer');
    Route::get('welkom', function () {
        return view('admin/welkom');
    })->name('welkom');
});

//Voor Strava
Route::get('/stravaAuthentication', [App\Http\Controllers\Member\StravaController::class, 'stravaAuthentication'])->name('stravaAuthentication');
Route::get('/success', [App\Http\Controllers\Member\StravaController::class, 'getToken']);


// Mail
Route::post('/password-reset', 'App\Http\Controllers\PasswordResetController@sendResetLinkEmail')->name('password.reset');
Route::post('/contact', [MailController::class, 'submitForm'])->name('contact.submit');



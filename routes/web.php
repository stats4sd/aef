<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyCaseController;
use App\Filament\App\Pages\Register;

Route::get('/', static function () {
    return redirect('/app');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cases/{studycase}', [StudyCaseController::class, 'getData']);

Route::get('/login', static function () {
    return redirect('/app/login');
})->name('login');

Route::get('register', Register::class)
    ->name('filament.app.register')
    ->middleware('signed');

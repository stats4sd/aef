<?php

use Illuminate\Support\Facades\Route;
use App\Filament\App\Pages\Register;

Route::get('/', static function () {
    return redirect('/app');
});

Route::get('/login', static function () {
    return redirect('/app/login');
})->name('login');

Route::get('register', Register::class)
    ->name('filament.app.register')
    ->middleware('signed');

<?php

use App\Models\StudyCase;
use Illuminate\Http\Request;
use App\Filament\App\Pages\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyCaseController;

Route::group([
    'middleware' => 'set.locale',
], function () {

    Route::get('/', static function () {
        return redirect('/home');
    });

    Route::get('/home', [StudyCaseController::class, 'index'])->name('home');

    Route::get('/create-your-case', [StudyCaseController::class, 'create'])->name('create');

    Route::get('/cases/{studycase}', [StudyCaseController::class, 'getData']);

    Route::get('/login', static function () {
        return redirect('/app/login');
    })->name('login');

    Route::get('register', Register::class)
        ->name('filament.app.register')
        ->middleware('signed');
});
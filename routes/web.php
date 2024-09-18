<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyCaseController;

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
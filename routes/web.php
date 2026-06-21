<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//CHIRP ROUTES
Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
});


// Route::resource('/chirps', ChirpController::class) //this is equivalent on the above
//     ->only('store', 'edit', 'update', 'destroy');

//REGISTER ROUTES
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', RegisterController::class)
    ->middleware('guest');

//LOGIN ROUTE
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', LoginController::class)
    ->middleware('guest');

//LOGOUT ROUTE
Route::post('logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');

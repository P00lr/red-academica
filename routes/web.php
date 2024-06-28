<?php

use App\Http\Controllers\ExamenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::prefix('/examenes')->group(function () {
    Route::get('/', [ExamenController::class, 'index'])->name('examenes.index');
    Route::get('/create', [ExamenController::class,'create'])->name('examenes.create');
}); */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('examens', ExamenController::class);
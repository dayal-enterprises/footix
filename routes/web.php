<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TeamController::class, 'index'])->name('home');

Route::resource('/teams', TeamController::class);
Route::resource('/players', PlayerController::class);
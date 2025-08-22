<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TeamController::class, 'index'])->name('home');

Route::resource('/teams', TeamController::class);
Route::resource('/players', PlayerController::class);
Route::resource('/games', GameController::class);
Route::resource('/goals', GoalController::class);
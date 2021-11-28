<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoupleController;
use App\Http\Controllers\GameController;

/*The api routing (stateless) was chosen, because we did not need to use sessions 
or csrf token that comes with the web routing midleware, due to lack of login system*/

Route::post('couple/add', [CoupleController::class, 'store'])->name('add-couple');
Route::post('game/add', [GameController::class, 'store'])->name('add-game');

Route::get('game/last/{id}', [GameController::class, 'fetchLast'])->name('last');

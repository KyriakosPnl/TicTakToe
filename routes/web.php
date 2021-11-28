<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoupleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
//Route::get('add-couple', [CoupleController::class, 'index']);
//Route::post('/add-couple', [CoupleController::class, 'store'])->name('add-couple');

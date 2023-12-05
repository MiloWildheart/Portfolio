<?php

use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('Portfolio-items', function () {
    return view('Portfolio-items.index');
});

Route::resource('Portfolio-items', PortfolioItemController::class);
Route::resource('Tags', TagController::class);
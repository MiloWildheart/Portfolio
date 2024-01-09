<?php

use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
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

//unautheticated
    //get routes
Route::get('/', function () { return view('welcome');});
Route::get('Home', function () { return view('welcome');});
Route::get('login', fn() => to_route('Auth.create'))->name('login');
    //delete routes
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
    //resource routes
Route::resource('Auth', AuthController::class)->only(['create', 'store']);


//Authentication
Route::middleware(['auth'])->group(function () {
    //get routes
Route::get('Portfolio-items', function () { return view('Portfolio-items.index');});
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::get('/Portfolio-items/{portfolioItem}/edit', [PortfolioItemController::class, 'edit'])->name('portfolio-items.edit');
    //put routes
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    //Delete routes
Route::delete('portfolio-items/{id}', [PortfolioItemController::class, 'destroy'])->name('portfolio-items.destroy');
Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
    //resource routes
Route::resource('Portfolio-items', PortfolioItemController::class);
Route::resource('Tags', TagController::class);

});





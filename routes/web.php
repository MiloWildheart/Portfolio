<?php

use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Tag;


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
Route::get('/', function () {return view('welcome');})->name('home');    
Route::get('portfolio', function () {
    $tags = Tag::all(); // Assuming you're fetching tags from your database
    return View::make('PublicPortfolio')->with('tags', $tags);
})->name('portfolio');
Route::get('portfolio/search', [PortfolioItemController::class, 'search'])->name('portfolio.search');
Route::get('login', fn() => to_route('Auth.create'))->name('login');

    //delete routes
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
    //resource routes
Route::resource('Auth', AuthController::class)->only(['create', 'store']);

// Portfolio Items routes for unauthenticated users (read-only)
Route::get('portfolio', [PortfolioItemController::class, 'index'])->name('portfolio-items.index');
Route::get('portfolio/{portfolioItem}', [PortfolioItemController::class, 'show'])->name('portfolio-items.show');

// Tags routes for unauthenticated users (read-only)
Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');

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





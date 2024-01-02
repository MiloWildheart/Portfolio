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

Route::get('Home', function () {
    return view('welcome');
});
Route::get('Portfolio-items', function () {
    return view('Portfolio-items.index');
});
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');



Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');


Route::delete('portfolio-items/{id}', [PortfolioItemController::class, 'destroy'])->name('portfolio-items.destroy');
Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

Route::resource('Portfolio-items', PortfolioItemController::class);
Route::resource('Tags', TagController::class);
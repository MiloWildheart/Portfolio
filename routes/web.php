<?php

use App\Http\Controllers\PortfolioItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\RelevantKnowledgeController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Models\Tag;
use App\Models\PortfolioItem;


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
    $portfolioItems = PortfolioItem::all();
    $tags = Tag::all();
    return view('PublicPortfolio', compact('portfolioItems', 'tags'));
})->name('portfolio.unauthenticated');
Route::get('portfolio/search', [PortfolioItemController::class, 'search'])->name('portfolio.search');
Route::redirect('/login', 'Auth/create');
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::get('about-me', [PersonalInfoController::class, 'resume'])->name('aboutMe');

    //delete routes

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
    //resource routes
Route::resource('Auth', AuthController::class)->only(['create', 'store', 'destroy']);




//Authentication
Route::middleware(['auth'])->group(function () {
    //get routes
Route::get('Portfolio-items', function () {
        return view('Portfolio-items.index');
    })->name('portfolio-items.index');
Route::get('logout', [AuthController::class, 'destroy'])->name('logout');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::get('portfolio-items/create', [PortfolioItemController::class, 'create'])->name('portfolioItems.create');
Route::get('/Portfolio-items/{portfolioItem}/edit', [PortfolioItemController::class, 'edit'])->name('portfolioItems.edit');
    //put routes
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    //Delete routes
Route::delete('portfolio-items/{id}', [PortfolioItemController::class, 'destroy'])->name('portfolioItems.destroy');
Route::delete('tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
    //resource routes
Route::resource('Portfolio-items', PortfolioItemController::class);
Route::resource('Tags', TagController::class);
Route::resource('education', EducationController::class);
Route::resource('work-experience', WorkExperienceController::class);
Route::resource('relevant-knowledge', RelevantKnowledgeController::class);
Route::resource('personal-info', PersonalInfoController::class);
    // Nested resource for PersonalInfoController within each resource
Route::resource('education.personal-info', PersonalInfoController::class);
Route::resource('work-experience.personal-info', PersonalInfoController::class);
Route::resource('relevant-knowledge.personal-info', PersonalInfoController::class);
});

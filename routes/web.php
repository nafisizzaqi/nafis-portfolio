<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Accounts\ProfileController;
use App\Http\Controllers\Resources\ArticleController;
use App\Http\Controllers\Resources\HeroController;

// Redirect root ke halaman login
Route::get('/', function () {
    return redirect()->route('login');
});

// Home - Menampilkan 4 artikel terbaru
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Halaman Semua Artikel
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman Hero
Route::get('/hero', [HeroController::class, 'index'])->middleware(['auth', 'verified'])->name('hero');

// Resource Routes
Route::resource('skill', App\Http\Controllers\Resources\SkillController::class);
Route::resource('experience', App\Http\Controllers\Resources\ExperienceController::class);
Route::resource('portfolio', App\Http\Controllers\Resources\PortfolioController::class);
Route::resource('contact', App\Http\Controllers\Resources\ContactController::class);

// Contact Form Submit
Route::post('/contact/store', [App\Http\Controllers\Resources\ContactController::class, 'store'])->name('contact.store');

// Store or Update Hero Section
Route::post('/hero/store-or-update', [HeroController::class, 'storeOrUpdate'])->name('hero.store_or_update');

// Middleware untuk halaman yang membutuhkan login
Route::middleware('auth')->group(function () {
    Route::prefix("account")->name("account.")->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/change-password', [ProfileController::class, 'password'])->name('profile.password');
        Route::patch('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// Load Routes Tambahan
require __DIR__ . '/auth.php';
require __DIR__ . '/resources.php';
require __DIR__ . '/master.php';

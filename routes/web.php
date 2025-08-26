<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AdminAuthController; 
use App\Http\Controllers\AdminDashboardController; 
use App\Http\Middleware\AdminAuth; 

// Home page route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Placeholder routes for navigation (to be implemented)
Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/quote', function () {
    return view('quote');
})->name('quote');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

// Legal pages
Route::get('/privacy', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('legal.terms');
})->name('terms');

// Test route for minimal Blade view troubleshooting
Route::get('/test-blade', function () {
    return view('test');
});

// Admin routes
Route::middleware([])->group(function() {
    Route::get('/admin/login', [AdminAuthController::class,'showLogin'])->name('admin.login.form');
    Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login');
});

Route::middleware([AdminAuth::class])->prefix('admin')->name('admin.')->group(function() {
    Route::post('logout', [AdminAuthController::class,'logout'])->name('logout');
    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    Route::get('quotes/export', [AdminDashboardController::class,'exportCsv'])->name('quotes.export');
    Route::get('quotes/{quote}', [AdminDashboardController::class,'show'])->name('quotes.show');
    Route::post('quotes/{quote}/status', [AdminDashboardController::class,'updateStatus'])->name('quotes.status');
    Route::post('quotes/{quote}/message', [AdminDashboardController::class,'sendMessage'])->name('quotes.message');
});
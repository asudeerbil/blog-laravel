<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Back\AboutController;

Route::prefix('admin')->name('admin.')->middleware('IsLogin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('IsAdmin')->group(function () {
    Route::get('welcome', [DashboardController::class, 'welcome'])->name('welcome');
    Route::get('panel', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles', ArticleController::class);
    Route::get('switch', [ArticleController::class, 'switch'])->name('switch');

    Route::resource('category', CategoryController::class);

    Route::resource('pages', PageController::class)->except(['show']);

    Route::resource('abouts', AboutController::class);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});




Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/page', [HomepageController::class, 'index']);
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
Route::post('/contact', [HomepageController::class, 'contactpost'])->name('contact.post');
Route::get('/inspirational-writings', [HomepageController::class, 'page'])->name('page');
Route::get('/about-me', [HomepageController::class, 'about'])->name('about');
Route::post('/contact', [HomepageController::class, 'contactpost'])->name('contact.post');

//sabit verdigimiz url'leri basta tanimlamamiz gerekiyor.

Route::get('/category/{category}', [HomepageController::class, 'category'])->name('category');
Route::get('/{category:slug}/{slug}', [HomepageController::class, 'single'])->name('single');

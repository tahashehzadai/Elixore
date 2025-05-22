<?php
// routes/admin.php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Home\BannerImageController;
use App\Http\Controllers\Admin\Home\ProductController;
use App\Http\Middleware\Admin;



    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Protected Routes
Route::middleware([Admin::class])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.frontend.dashboard');
        })->name('dashboard');



// Home Banner Images

Route::get('banner-images', [BannerImageController::class, 'index'])->name('banner-images.index'); // GET all
Route::get('banner-images/create', [BannerImageController::class, 'create'])->name('banner-images.create'); // GET form
Route::post('banner-images/store', [BannerImageController::class, 'store'])->name('banner-images.store'); // POST form data
Route::get('banner-images/{id}', [BannerImageController::class, 'show'])->name('banner-images.show'); // GET single banner
Route::get('banner-images/{id}/edit', [BannerImageController::class, 'edit'])->name('banner-images.edit'); // GET edit form
Route::post('banner-images/{id}/update', [BannerImageController::class, 'update'])->name('banner-images.update'); // POST update data
Route::post('banner-images/{id}/delete', [BannerImageController::class, 'destroy'])->name('banner-images.destroy'); // POST delete        
Route::get('/admin/banner-images/fetch', [BannerImageController::class, 'fetch'])->name('banner-images.fetch');


// Home Products

Route::get('products', [ProductController::class, 'index'])->name('products.index'); // GET all
Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // GET form
Route::post('products/store', [ProductController::class, 'store'])->name('products.store'); // POST form data
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); // GET single banner
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // GET edit form
Route::post('products/{id}/update', [ProductController::class, 'update'])->name('products.update'); // POST update data
Route::post('products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy'); // POST delete        
    });



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Default\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    
    return response()->json([
        'status' => true,
        'message' => '✅ Cache cleared and optimized successfully!'
    ]);
});
Route::get('/', [FrontendController::class, 'home'])->name('main');

Route::get('/login', [LoginController::class, 'index'])->name('user.login');
Route::post('/login/post', [LoginController::class, 'login'])->name('user.login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register.get');;
Route::post('/register-user', [RegisterController::class, 'register'])->name('user.register');
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// User routes
Route::middleware(['auth', 'grant-by-user:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
});


// Admin routes
Route::middleware(['auth', 'grant-by-user:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get ('/user',[UserController::class, 'index'])->name('user.index');
    Route::get ('/user/create',[UserController::class, 'create'])->name('user.create');
    Route::post ('/user',[UserController::class, 'store'])->name('user.store');
    Route::get ('/user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::put ('/user/{user}',[UserController::class, 'update'])->name('user.update'); 
    Route::delete ('/user/{user}',[UserController::class, 'destroy'])->name('user.destroy');
    Route::get ('/user/{user}/show',[UserController::class, 'show'])->name('user.show');
     });



Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call_back',[GoogleAuthController::class,'callbackGoogle']);


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

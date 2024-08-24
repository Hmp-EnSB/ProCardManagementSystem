<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
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
    
    Route::prefix('request')->group(function () {
        Route::get('/create', [RequestController::class, 'create'])->name('request.create');
        Route::post('/', [RequestController::class, 'store'])->name('request.store');
        Route::get('/{id}/edit', [RequestController::class, 'edit'])->name('request.edit');
        Route::put('/{id}', [RequestController::class, 'update'])->name('request.update');
        Route::get('/{id}', [RequestController::class, 'show'])->name('request.show');
    });
});

// Admin routes
Route::middleware(['auth', 'grant-by-user:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');
    });
    Route::prefix('requests')->group(function () {
        Route::get('/', [RequestController::class, 'index'])->name('requests.index');
        Route::get('/{id}/pending', [RequestController::class, 'pending'])->name('requests.pending');
        Route::get('/{id}/show', [RequestController::class, 'show'])->name('requests.show');
        Route::delete('/{id}/rejected', [RequestController::class, 'rejected'])->name('requests.rejected');
        Route::get('/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
    });   
   
});


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call_back', [GoogleAuthController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

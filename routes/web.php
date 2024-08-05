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

    Route::prefix('admin/requests')->group(function () {
     Route::get('', [RequestController::class, 'index'])->name('admin.requests.index');
     Route::get('pending', [RequestController::class, 'index_p'])->name('admin.requests.pending');
     Route::get('approved', [RequestController::class, 'index_a'])->name('admin.requests.approved');
     Route::get('rejected', [RequestController::class, 'index_d'])->name('admin.requests.rejected');
     Route::get('show/{id}', [RequestController::class, 'show'])->name('admin.requests.show');
     Route::post('approve/{id}', [RequestController::class, 'approveRequest'])->name('admin.requests.approve');
     Route::post('decline/{id}', [RequestController::class, 'declineRequest'])->name('admin.requests.decline');
     Route::post('undo/{id}', [RequestController::class, 'undoDecision'])->name('admin.requests.undo');
     Route::delete('destroy/{id}', [RequestController::class, 'destroy'])->name('admin.requests.destroy');
    });
    
});

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call_back', [GoogleAuthController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

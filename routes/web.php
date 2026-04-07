<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});



// User routes
Route::middleware(['auth', 'grant-by-user:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
     // User profile management
     Route::get('/user/profileuser', [ProfileUserController::class, 'edit'])->name('profileuser.edit');
     Route::patch('/user/profileuser', [ProfileUserController::class, 'update'])->name('profileuser.update'); 
     Route::delete('/user/profileuser', [ProfileUserController::class, 'destroy'])->name('profileuser.destroy');
   
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
    
      // Admin profile management
      Route::get('/admin/profileadmin', [ProfileController::class, 'edit'])->name('profileadmin.edit');
      Route::patch('/admin/profileadmin', [ProfileController::class, 'update'])->name('profileadmin.update');
      Route::delete('/admin/profileadmin', [ProfileController::class, 'destroy'])->name('profileadmin.destroy');
    
      Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');
    });

        Route::prefix('requests')->middleware(['auth', 'grant-by-user:admin'])->group(function () {
            Route::get('', [RequestController::class, 'index'])->name('admin.requests');
            Route::get('pending', [RequestController::class, 'index_p'])->name('requests.pending');
            Route::get('approved', [RequestController::class, 'index_a'])->name('requests.approved');
            Route::get('rejected', [RequestController::class, 'index_d'])->name('requests.rejected');
            Route::get('show/{id}', [RequestController::class, 'show'])->name('admin.request.show');
            Route::post('approve/{id}', [RequestController::class, 'approveRequest'])->name('admin.request.approve');
            Route::post('decline/{id}', [RequestController::class, 'declineRequest'])->name('admin.request.decline');
            Route::delete('destroy/{id}', [RequestController::class, 'destroy'])->name('requests.destroy'); 
            Route::post('undo/{id}', [RequestController::class, 'undoDecision'])->name('decision.undo');   
        });
    
   
});


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call_back', [GoogleAuthController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User routes
Route::middleware(['auth', 'grant-by-user:user'])->group(function () {
    Route::get('/user/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('user.dashboard');
   
});


// Admin routes
Route::middleware(['auth', 'grant-by-user:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get ('/user',[UserController::class, 'index'])->name('user.index');
    Route::get ('/user/create',[UserController::class, 'create'])->name('user.create');
    Route::post ('/user',[UserController::class, 'store'])->name('user.store');
    Route::get ('/user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::patch ('/user/{user}',[UserController::class, 'update'])->name('user.update'); 
    Route::delete ('/user/{user}',[UserController::class, 'destroy'])->name('user.destroy');
    Route::get ('/user/{user}/show',[UserController::class, 'show'])->name('user.show');
     });



Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call_back',[GoogleAuthController::class,'callbackGoogle']);


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

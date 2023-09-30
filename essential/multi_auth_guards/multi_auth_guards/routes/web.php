<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;



Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('role', RoleController::class);

    Route::resource('user', UserController::class);

    Route::resource('admin', AdminController::class);

    // Admin login
    Route::get('login', [AuthenticatedSessionController::class, 'showLogingForm'])->name('admin.login');
    Route::post('login/submit', [AuthenticatedSessionController::class, 'login'])->name('admin.login.submit');

    // Admin logout
    Route::post('logout/submit', [AuthenticatedSessionController::class, 'logout'])->name('admin.logout.submit');

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignedEmployee;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;



Route::get('/', function () {
    return view('welcome');
});

 Route::get('lang/{lang}',[LanguageController::class, 'switchLang'])->name('lang.switch');
 
//Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);



Route::get('/dashboard', function () {
    return view('admin.home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('companies', CompanyController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// for Company controller
Route::resource('companies', CompanyController::class);


// for Employee controller
Route::resource('employees', EmployeeController::class);

//Employees Assign A Company
Route::get('/employees-assign', [AssignedEmployee::class, 'index'])->name('abcd');
Route::get('/employees-login', [AssignedEmployee::class, 'employeeDashboard'])->name('employee.login');

});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome');

Route::get('/', [HomepageController::class, 'home'])->name('homepage.home');

Route::get('about', [HomepageController::class, 'about'])->name('homepage.about');

Route::get('contact', [HomepageController::class, 'contact'])->name('homepage.contact');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
});

require __DIR__.'/auth.php';

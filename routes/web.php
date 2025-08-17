<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::resource('api-directory', App\Http\Controllers\ApiDirectoryController::class);
    // Route::get('/api-directory', [App\Http\Controllers\ApiDirectoryController::class, 'index'])->name('api-directory.index');
    // Route::get('/api-directory/create', [App\Http\Controllers\ApiDirectoryController::class, 'create'])->name('api-directory.create');

});

require __DIR__.'/auth.php';

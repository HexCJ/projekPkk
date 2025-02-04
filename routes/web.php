<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tindakLanjutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/dokter', [dokterController::class, 'index'])->name('dokter');
Route::get('/tindaklanjut', [tindakLanjutController::class, 'index'])->name('tl');

require __DIR__.'/auth.php';

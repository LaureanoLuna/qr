<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrController;
use App\Models\Qr;
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

    Route::get('/create', [QrController::class, 'create'])->name('qr.create');
    Route::post('/create', [QrController::class, 'store']);
    Route::get('/qr/{id}', [QrController::class, 'show'])->name('qr.view');
    Route::get('/qr', [QrController::class, 'qrList'])->name('qr.list');
});

require __DIR__ . '/auth.php';

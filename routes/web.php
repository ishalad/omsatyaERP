<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\MachineSaleEntryController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProfileController;
use App\Models\Complaint;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('parties', PartyController::class)->middleware(['auth']);
Route::resource('MachineSales', MachineSaleEntryController::class)->middleware(['auth']);
Route::post('update-machine-sales/{id}', [MachineSaleEntryController::class, 'update'])->name('machine-sales.update')->middleware(['auth']);

Route::group(['prefix' => 'complaints'], function () {
    Route::get('/index', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/create', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/store', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::post('/update', [ComplaintController::class, 'update'])->name('complaints.update');
});

require __DIR__.'/auth.php';

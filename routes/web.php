<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\MachineSaleEntryController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Complaint;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/assign-roles/{user}', [UserController::class, 'assignRoles'])->name('users.assignRoles');
});

route::group(['prefix' => 'engineers', 'middleware' => ['auth']], function () {
    Route::get('/index', [EngineerController::class, 'index'])->name('engineers.index');
    Route::get('/create', [EngineerController::class, 'create'])->name('engineers.create');
    Route::post('/store', [EngineerController::class, 'store'])->name('engineers.store');
    Route::get('/edit/{user}', [EngineerController::class, 'edit'])->name('engineers.edit');
    Route::post('/update/{user}', [EngineerController::class, 'update'])->name('engineers.update');
    Route::delete('/destroy/{user}', [EngineerController::class, 'destroy'])->name('engineers.destroy');
    Route::post('/assign-roles/{user}', [EngineerController::class, 'assignRoles'])->name('engineers.assignRoles');
});


// Route::resource('parties', PartyController::class)->middleware(['auth']);
Route::resource('MachineSales', MachineSaleEntryController::class)->middleware(['auth']);
Route::post('update-machine-sales/{id}', [MachineSaleEntryController::class, 'update'])->name('machine-sales.update')->middleware(['auth']);
Route::group(['prefix' => 'parties'], function () {
    Route::get('/index', [PartyController::class, 'index'])->name('parties.index')->middleware('auth');
    Route::get('/create', [PartyController::class, 'create'])->name('parties.create')->middleware('auth');
    Route::post('/store', [PartyController::class, 'store'])->name('parties.store')->middleware('auth');
    Route::get('edit/{party}', [PartyController::class, 'edit'])->name('parties.edit')->middleware('auth');
    Route::post('/update/{party}', [PartyController::class, 'update'])->name('parties.update')->middleware('auth');
    Route::delete('/destroy/{party}', [PartyController::class, 'destroy'])->name('parties.destroy')->middleware('auth');
    // Route::post('/add-complaint-item-part', [ComplaintController::class, 'AddComplaintItemPart'])->name('complaints.itemPartStore')->middleware('auth');
});
Route::group(['prefix' => 'complaints', 'middleware' => ['auth']], function () {
    Route::get('/index', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/create', [ComplaintController::class, 'create'])->name('complaints.create');
    Route::post('/store', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/edit/{complaint}', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::post('/update/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('/destroy/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    Route::post('/add-complaint-item-part', [ComplaintController::class, 'AddComplaintItemPart'])->name('complaints.itemPartStore');
    Route::get('/report', [ComplaintController::class, 'report'])->name('complaints.report');
    Route::get('/data', [ComplaintController::class, 'data'])->name('complaints.data');
});

route::get('party-products', [ComplaintController::class, 'partyProducts'])->name('party-products')->middleware('auth');
Route::get('sales-entry-details', [ComplaintController::class, 'machineEntry'])->name('sales-entry-details')->middleware('auth');



require __DIR__ . '/auth.php';

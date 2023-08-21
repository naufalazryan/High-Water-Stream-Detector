<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/banjir', function () {
    return view('banjir');
})->middleware(['auth', 'verified'])->name('banjir');

Route::get('/suhu', function () {
    return view('suhu');
})->middleware(['auth', 'verified'])->name('suhu');

Route::get('/kelembapan', function () {
    return view('kelembapan');
})->middleware(['auth', 'verified'])->name('kelembapan');

Route::get('/hujan', function () {
    return view('hujan');
})->middleware(['auth', 'verified'])->name('hujan');

Route::get('/dashboard', [SensorController::class, 'showDashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [SensorDataController::class, 'index'])->name('dashboard');


require __DIR__ . '/auth.php';

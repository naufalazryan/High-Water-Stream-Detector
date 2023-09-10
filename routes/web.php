<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BanjirController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\HujanController;
use App\Http\Controllers\KelembapanController;
use App\Http\Controllers\NodeMcuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SuhuController;
use App\Models\DataSuhu;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...

        // Localized Routes here **/
        Route::get('/', function () {
            return view('dashboard');
        });


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

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

        Route::middleware('auth', 'preventBackAfterLogout')->group(function () {

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
            Route::get('/', [SensorDataController::class, 'index'])->name('dashboard');
            Route::get('/dashboard', [SensorDataController::class, 'index'])->name('dashboard');
            Route::get('/suhu', [SuhuController::class, 'index'])->name('suhu');
            Route::get('/kelembapan', [KelembapanController::class, 'index'])->name('kelembapan');
            Route::get('/banjir', [BanjirController::class, 'index'])->name('banjir');
            Route::get('/hujan', [HujanController::class, 'index'])->name('hujan');

            Route::get('lang.edit', [LanguageController::class, 'index'])->name('language');

            Route::get('/nilaibanjir', [BanjirController::class, 'nilaibanjir']);
            Route::get('/keadaanbanjir', [BanjirController::class, 'keadaanbanjir']);

            Route::get('/nilaisuhu', [SuhuController::class, 'nilaisuhu']);
            Route::get('/keadaansuhu', [SuhuController::class, 'keadaansuhu']);

            Route::get('/nilaikelembapan', [KelembapanController::class, 'nilaikelembapan']);
            Route::get('/keadaankelembapan', [KelembapanController::class, 'keadaankelembapan']);

            Route::get('/nilaihujan', [HujanController::class, 'nilaihujan']);
            Route::get('/keadaanhujan', [HujanController::class, 'keadaanhujan']);


            Route::get('/search', [SensorDataController::class, 'search']);
            Route::delete('/delete_data/{id}', [SensorDataController::class, 'destroy']);

            Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.index');

            Route::get('/dashboard/keadaan', [SensorDataController::class, 'keadaan'])->name('dashboard.keadaan');

            Route::get('/banjir', [BanjirController::class, 'diagram'])->name('banjir');
            Route::get('/get-latest-data', [BanjirController::class, 'getLatestData']);

            


        });


        // routes/web.php or routes/api.php
    }
);

require __DIR__ . '/auth.php';

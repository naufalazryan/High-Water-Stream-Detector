<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanjirController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SensorController;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',function(){
    return response()->json([
        'status'=>false,
        'message'=>'Akses Tidak Diperbolehkan'
    ], 401);
})->name('login');

Route::get('sensor',[SensorController::class,'index'])->middleware('auth:sanctum');
Route::post('registerUser',[AuthController::class,'registerUser']);
Route::post('loginUser',[AuthController::class,'loginUser']);

Route::get('/export-data', [ExportController::class, 'export'])->name('export.data');

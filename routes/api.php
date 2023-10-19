<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\IphCardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/folios', [FolioController::class, 'store']);
Route::get('/folios', [FolioController::class, 'index']);
Route::post('/medicalRecords', [MedicalRecordController::class, 'store']);
Route::get('/medicalRecords', [MedicalRecordController::class, 'index']);
Route::post('/iphcards', [IphCardController::class, 'store']);
Route::get('/iphcards', [IphCardController::class, 'index']);

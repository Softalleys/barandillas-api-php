<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\IphCardController;
use App\Http\Controllers\JudgeRulingController;
use App\Http\Controllers\DetaineeController;

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
Route::post('/medical_records', [MedicalRecordController::class, 'store']);
Route::get('/medical_records', [MedicalRecordController::class, 'index']);
Route::post('/iph_cards', [IphCardController::class, 'store']);
Route::get('/iph_cards', [IphCardController::class, 'index']);
Route::post('/judge_rulings', [JudgeRulingController::class, 'store']);
Route::get('/judge_rulings', [JudgeRulingController::class, 'index']);
Route::get('/judge_rulings/{folio_uuid}', [JudgeRulingController::class, 'getFolioData']);
Route::post('/detainees', [DetaineeController::class, 'store']);
Route::get('/detainees', [DetaineeController::class, 'index']);

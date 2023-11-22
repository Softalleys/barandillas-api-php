<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\IphCardController;
use App\Http\Controllers\JudgeRulingController;
use App\Http\Controllers\DetaineeController;
use App\Http\Controllers\SearchController;

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

Route::post('/folios/create', [FolioController::class, 'store']);
Route::get('/folios', [FolioController::class, 'index']);
// Route::get('/folios/{id}/folios', [FolioController::class, 'folioData']);
Route::post('/medical_records', [MedicalRecordController::class, 'store']);
Route::get('/medical_records', [MedicalRecordController::class, 'index']);
Route::post('/iph_cards', [IphCardController::class, 'store']);
Route::get('/iph_cards', [IphCardController::class, 'index']);
Route::post('/judge_rulings', [JudgeRulingController::class, 'store']);
Route::get('/judge_rulings', [JudgeRulingController::class, 'index']);
Route::post('/search_folio', [SearchController::class, 'searchFolio']);
Route::get('/search_folio', [SearchController::class, 'searchFolio']);
Route::get('/search_folios', [SearchController::class, 'searchFolios']);
Route::get('/search_detainees', [SearchController::class, 'searchDetainees']);
Route::get('/search_iphs',[SearchController::class, 'searchIphs']);
Route::post('/detainees', [DetaineeController::class, 'store']);
Route::get('/detainees', [DetaineeController::class, 'index']);

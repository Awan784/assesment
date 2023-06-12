<?php

use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\ReportApiController;
use App\Models\User;
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

// Profile
Route::get('/profile/all',[ProfileApiController::class,'all']);
Route::get('/profile/{id}',[ProfileApiController::class,'get']);
Route::get('/profile/delete/{id}',[ProfileApiController::class,'delete']);
Route::post('/profile/update/{id}',[ProfileApiController::class,'update']);
Route::post('/profile/create',[ProfileApiController::class,'create']);

// Report
Route::get('/report/all',[ReportApiController::class,'all']);
Route::get('/report/{id}',[ReportApiController::class,'get']);
Route::get('/report/delete/{id}',[ReportApiController::class,'delete']);
Route::post('/report/update/{id}',[ReportApiController::class,'update']);
Route::post('/report/create',[ReportApiController::class,'create']);


Route::get('/create/pdf', [ReportApiController::class,'createPdf']);


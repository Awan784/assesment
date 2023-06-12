<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    $profile=User::all();
    return view('profile.index',['profile'=>$profile]);
});
Route::resources([
    'report' => ReportController::class,
    'profile' => ProfileController::class,
]);
Route::get('/destroy/{id}',[ProfileController::class,'delete'])->name('profile.delete');
Route::get('report/destroy/{id}',[ReportController::class,'delete'])->name('report.delete');
Route::get('/pdf', [ReportController::class,'pdf'])->name('pdf');
Route::get('/create/pdf', [ReportController::class,'createPdf'])->name('create.pdf');

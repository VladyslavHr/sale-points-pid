<?php

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
Route::get('/sale-points', [App\Http\Controllers\SalePointController::class, 'openPointsApi']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




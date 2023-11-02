<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('saveJsonLocally', [App\Http\Controllers\SaveJsonController::class, 'saveJsonLocally'])->name('saveJsonLocally');
Route::get('saveJsonToDatabase', [App\Http\Controllers\SaveJsonController::class, 'saveJsonToDatabase'])->name('saveJsonToDatabase');

Route::get('/', [App\Http\Controllers\SalePointController::class, 'index'])->name('salePoints.index');

<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// サンプルAPI
Route::get('/sample', [SampleController::class, 'index']);

Route::resource('user', UserController::class)->except([
    'create', 'edit'
]);

Route::resource('book', BookController::class)->except([
    'create', 'edit'
]);

Route::resource('loan', LoansController::class)->except([
    'create', 'edit'
]);

Route::resource('review', ReviewsController::class)->except([
    'create', 'edit'
]);


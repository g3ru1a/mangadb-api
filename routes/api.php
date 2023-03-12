<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeriesTypeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('binding', BindingController::class);
    Route::apiResource('language', LanguageController::class);
    Route::apiResource('itemtype', ItemTypeController::class);
    Route::apiResource('publisher', PublisherController::class);
    Route::apiResource('status', StatusController::class);
    Route::apiResource('staff', StaffController::class);
    Route::apiResource('series', SeriesController::class);
    Route::apiResource('book', BookController::class);
});

Route::post('/media/test', [MediaController::class, 'mediaTest']);

// Review Routes
Route::prefix('/review')->middleware(['auth:sanctum'])->group(function() {
    Route::get('/comments/{review}', [ReviewController::class, 'comments']);
    Route::post('/comment/{review}', [ReviewController::class, 'comment']);
    Route::middleware(['editor'])->group(function () {
        Route::post('/assign/{review}/{user?}', [ReviewController::class, 'assign']);
        Route::post('/approve/{review}', [ReviewController::class, 'approve']);
        Route::post('/reject/{review}', [ReviewController::class, 'reject']);
    });
});

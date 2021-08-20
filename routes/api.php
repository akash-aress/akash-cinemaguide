<?php

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

// Public Routes
Route::post("/register",[App\Http\Controllers\API\CinemaAPIController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('movies', [App\Http\Controllers\API\CinemaAPIController::class, 'movies']);
    Route::get('cinemas', [App\Http\Controllers\API\CinemaAPIController::class, 'cinemas']);
    Route::get('cinema/{name}', [App\Http\Controllers\API\CinemaAPIController::class, 'cinema_details']);
    Route::get('movie/{title}', [App\Http\Controllers\API\CinemaAPIController::class, 'movie_details']);
    Route::get('/movies/{name}/{date}', [App\Http\Controllers\Api\CinemaAPIController::class, 'cinema_movie'])->name('cinema-movie');
});


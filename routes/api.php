<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TaskController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->middleware('guest:api')->name('login');
    Route::post('/register', 'register')->middleware('guest:api');
    Route::get('/refresh', 'refresh')->middleware('auth:api');
    Route::get('/userProfile', 'userProfile')->middleware('auth:api');
    Route::post('/logout', 'logout')->middleware('auth:api')->name('logout');
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('categories',  'index')->middleware('auth:api');
    Route::post('categories',  'store')->middleware('auth:api');
    Route::get('categories/{id}',  'show')->middleware('auth:api');
    Route::put('categories/{id}',  'update')->middleware('auth:api');
    Route::delete('categories/{id}',  'destroy')->middleware('auth:api');
});
Route::controller(TaskController::class)->group(function () {
    Route::get('tasks','index')->middleware('auth:api');
    Route::post('tasks','store')->middleware('auth:api');
    Route::get('tasks/{id}','show')->middleware('auth:api');
    Route::put('tasks/{id}','update')->middleware('auth:api');
    Route::delete('tasks/{id}','destroy')->middleware('auth:api');
});

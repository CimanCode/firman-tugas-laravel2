<?php

use App\Http\Controllers\beckend\postcontroller;
use App\Http\Controllers\Beckend\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/product/create', [ProductController::class, 'store']);
Route::put('/product/update/{id}', [ProductController::class, 'update']);
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy']);

Route::get('/post', [postcontroller::class, 'index']);
Route::get('/post/{id}', [postcontroller::class, 'show']);
Route::post('/post/create', [postcontroller::class, 'store']);
Route::put('/post/update/{id}', [postcontroller::class, 'update']);
Route::delete('/post/delete/{id}', [postcontroller::class, 'destroy']);

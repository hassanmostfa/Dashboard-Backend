<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
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

/** Start User Routes */
Route::post('signup' , [userController::class , 'signup']) ;
Route::post('login' , [userController::class , 'login']) ;
/** End User Routes */

/** Start Product Routes */
Route::post('addProduct' , [productController::class , 'addProduct']) ;
Route::get('listProducts' , [productController::class , 'listProducts']) ;
Route::delete('delete/{id}' , [productController::class , 'delete']) ;
Route::get('getProduct/{id}' , [productController::class , 'getProduct']) ;
Route::put('updateProduct/{id}' , [productController::class , 'updateProduct']) ;
Route::get('search/{key}' , [productController::class , 'search']) ;
/** End Product Routes */
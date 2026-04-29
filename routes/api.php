<?php

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
<<<<<<< HEAD
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
=======
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    return $request->user();
});

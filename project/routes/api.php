<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DbController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::get('/show/{id}',[DbController::class,'show']);
Route::get('/show',[DbController::class,'index'])->name('api.ajax');

Route::get('/qu',[DbController::class,'custom'])->name('api.ajax2');

//export all col
Route::get('/toexcel',[DbController::class,'toexcel'])->name('api.toexcel');

//store in table
Route::post('/show',[DbController::class,'store']);


//export  specific col in a table

Route::get('/excel',[DbController::class,'excel'])->name('api.excel');

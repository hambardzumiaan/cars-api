<?php

use App\Http\Controllers\API\Cars\CarBodyStyleController;
use App\Http\Controllers\API\Cars\CarDriveTypeController;
use App\Http\Controllers\API\Cars\CarEngineController;
use App\Http\Controllers\API\Cars\CarExteriorColorController;
use App\Http\Controllers\API\Cars\CarFuelTypeController;
use App\Http\Controllers\API\Cars\CarInteriorColorController;
use App\Http\Controllers\API\Cars\CarMarkController;
use App\Http\Controllers\API\Cars\CarModelController;
use App\Http\Controllers\API\Cars\CarTypeController;
use App\Http\Controllers\API\Cars\CarYearController;
use App\Http\Controllers\API\LoginController;
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

Route::controller(LoginController::class)->group(function(){
    Route::post('login', 'login');
});


Route::middleware('auth:sanctum')->group( function () {
    Route::group(['prefix' => 'car'], function(){
        Route::resource('types', CarTypeController::class);
        Route::resource('marks', CarMarkController::class);
        Route::resource('models', CarModelController::class);
        Route::resource('years', CarYearController::class);
        Route::resource('body/styles', CarBodyStyleController::class);
        Route::resource('fuel/types', CarFuelTypeController::class);
        Route::resource('engines', CarEngineController::class);
        Route::resource('drive/types', CarDriveTypeController::class);
        Route::resource('interior/colors', CarInteriorColorController::class);
        Route::resource('exterior/colors', CarExteriorColorController::class);
    });
});

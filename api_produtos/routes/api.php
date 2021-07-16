<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SheduleController;

Route::group(['middleware' => 'api'], function ($router)  {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register',[AuthController::class, 'register']);

});
Route::resource('shedules', SheduleController::class);
Route::resource('products', ProductController::class);


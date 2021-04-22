<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\CurrencyController;

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
| post:user/login         authenticate user
| get:user/logout         authenticate user
|
*/
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/user/logout/{id}', [UserController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| CONVERSION
|--------------------------------------------------------------------------
| get:conversion/{id}             get conversion
| get:conversion/user/{user_id}   list conversions by user (includes quotes)
| post:conversion                 create conversion
| update:conversion               update conversion
| delete:conversion/{id}          delete conversion
|
*/
Route::get('/conversion/{id}', [ConversionController::class, 'get']);
Route::get('/conversion/user/{user_id}', [ConversionController::class, 'listByUser']);
Route::post('/conversion', [ConversionController::class, 'create']);
Route::update('/conversion', [ConversionController::class, 'update']);
Route::delete('/conversion/{id}', [ConversionController::class, 'delete']);

/*
|--------------------------------------------------------------------------
| CURRENCY
|--------------------------------------------------------------------------
| get:currency      list currencies
|
*/
Route::get('/currency', [CurrencyController::class, 'list']);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\QuoteController;

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
| post:user/login     authenticate user
| get:user/logout     authenticate user
|
*/
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout/{id}', [UserController::class, 'logout'])->middleware('authorized');

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
Route::get('/conversion/{id}', [ConversionController::class, 'get'])->middleware('authorized');
Route::get('/conversion/user/{user_id}', [ConversionController::class, 'listByUser'])->middleware('authorized');
Route::post('/conversion', [ConversionController::class, 'create'])->middleware('authorized');
Route::delete('/conversion/{id}', [ConversionController::class, 'delete'])->middleware('authorized');

/*
|--------------------------------------------------------------------------
| QUOTE
|--------------------------------------------------------------------------
| post:quote    add quote to conversion
|
*/
Route::post('/quote', [QuoteController::class, 'add'])->middleware('authorized');
Route::delete('/quote/{id}', [QuoteController::class, 'delete'])->middleware('authorized');

/*
|--------------------------------------------------------------------------
| CURRENCY
|--------------------------------------------------------------------------
| get:currency    list currencies
|
*/
Route::get('/currency', [CurrencyController::class, 'list'])->middleware('authorized');

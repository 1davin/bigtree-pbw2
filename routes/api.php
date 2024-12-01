<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesanController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/midtrans-callback', [OrderController::class, 'callback']);
Route::post('/midtrans-callback', [PesanController::class, 'callback']);




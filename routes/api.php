<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/product', [productController::class, 'index']);
//post
Route::post('/product', [productController::class, 'store']);
Route::get('/product/{id}', [productController::class, 'show']);
Route::put('/product/{id}', [productController::class, 'update']);
Route::delete('/product/{id}', [productController::class, 'destroy']);


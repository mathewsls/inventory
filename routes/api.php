<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/product', [productController::class, 'index']);

Route::get('/product/{id}', [productController::class, 'show']);
Route::post('/product', [productController::class, 'store']);
Route::put('/product/{id}', function () {
    return 'actualizar producto';
});
Route::delete('/product/{id}', [productController::class, 'destroy']);


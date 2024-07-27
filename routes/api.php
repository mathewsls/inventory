<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/product', function () {
    return 'lista de productos';
});
Route::get('/product/{id}', function () {
    return 'obteniendo un producto';
});
Route::post('/product', function () {
    return 'crear producto';
});
Route::put('/product/{id}', function () {
    return 'actualizar producto';
});
Route::delete('/product/{id}', function () {
    return 'eliminar producto';
});


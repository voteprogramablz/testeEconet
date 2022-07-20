<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(ClientController::class)->prefix("cliente")->group(function () {
    Route::get("/cadastro", 'index');
    Route::post("/cadastro", 'store');
});

Route::controller(ProductController::class)->prefix("produto")->group(function () {
    Route::get("/cadastro", 'index');
    Route::post("/cadastro", 'store');
});

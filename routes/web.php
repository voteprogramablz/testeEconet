<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(ClientController::class)->prefix("clientes")->group(function () {
    Route::get("/", 'index')->name("client.index");
    Route::get("/cadastro", 'create')->name("client.create");
    Route::get("/visualizar/{id}", 'show')->name("client.show");
    Route::post("/cadastro", 'store')->name("client.store");
    Route::delete("/delete/{id}", 'destroy')->name("client.destroy");

    Route::any("/search", "search")->name("client.search");
});

Route::controller(ProductController::class)->prefix("produtos")->group(function () {
    Route::get("/cadastro", 'index');
    Route::post("/cadastro", 'store');
});

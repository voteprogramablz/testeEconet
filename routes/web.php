<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::controller(ClientController::class)->prefix("clientes")->group(function () {
    Route::get("/", 'index')->name("client.index");
    Route::get("/cadastro", 'create')->name("client.create");
    Route::get("/visualizar/{client}", 'edit')->name("client.edit");

    Route::post("/cadastro", 'store')->name("client.store");

    Route::delete("/delete/{client}", 'destroy')->name("client.destroy");

    Route::patch("/atualizar/{client}", "update")->name("client.update");

    Route::any("/search", "search")->name("client.search");
});

Route::controller(ProductController::class)->prefix("produtos")->group(function () {
    Route::get("/", 'index')->name("product.index");
    Route::get("/cadastro", 'create')->name("product.create");
    Route::get("/visualizar/{product}", 'edit')->name("product.edit");

    Route::post("/cadastro", 'store')->name("product.store");

    Route::delete("/delete/{order}", 'destroy')->name("product.destroy");

    Route::patch("/atualizar/{order}", "update")->name("product.update");

    Route::any("/search", "search")->name("product.search");
});

Route::controller(OrderController::class)->prefix("pedidos")->group(function () {
    Route::get("/", 'index')->name("order.index");
    Route::get("/cadastro", 'create')->name("order.create");
    Route::get("/visualizar/{order}", 'edit')->name("order.edit");

    Route::post("/cadastro", 'store')->name("order.store");

    Route::delete("/delete/{order}", 'destroy')->name("order.destroy");

    Route::patch("/atualizar/{order}", "update")->name("order.update");

    Route::any("/search", "search")->name("order.search");
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/p5-pweb', function () {
    return view('pratikum');
});




Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/components/menu', function () {
    return view('/components/menu');
});

Route::get('/components/card', function () {
    return view('/components/card');
});


route::get('/listproduk', [ListProdukController::class, 'show']);
route::POST('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');
Route::put('/produk/update/{id}', [ListProdukController::class, 'update'])->name('produk.update');

route::get('/produk/edit/{id}', [ListProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [ListProdukController::class, 'update'])->name('produk.update');

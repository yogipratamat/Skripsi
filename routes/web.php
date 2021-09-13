<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    //ROLE PENYULUH//
    Route::middleware(['role:penyuluh'])->prefix('penyuluh')->namespace('Penyuluh')->name('penyuluh.')->group(function () {
        //Kelompok Tani
        Route::prefix('kelompok-tani')->name('group-farm.')->group(function () {

            Route::get('/', 'GroupFarmController@index')->name('index');
            Route::get('/create', 'GroupFarmController@create')->name('create');
            Route::post('/create', 'GroupFarmController@store')->name('store');
            Route::get('/edit/{id}', 'GroupFarmController@edit')->name('edit');
            Route::post('/edit/{id}', 'GroupFarmController@update')->name('update');
            Route::get('/delete/{id}', 'GroupFarmController@destroy')->name('destroy');
        });
        //PRODUK
        Route::prefix('produk')->name('product.')->group(function () {

            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/create', 'ProductController@store')->name('store');
            Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
            Route::post('/edit/{id}', 'ProductController@update')->name('update');
            Route::get('/delete/{id}', 'ProductController@destroy')->name('destroy');
        });
        //PESANAN PRODUK
        Route::prefix('pesanan')->name('order.')->group(function () {

            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/show/{id}', 'OrderController@show')->name('show');
            Route::get('/approve/{id}', 'OrderController@approve')->name('approve');
        });
        //LAPORAN PRODUK
        Route::prefix('laporan')->name('report.')->group(function () {

            Route::get('/', 'ReportController@index')->name('index');
        });
    });

    //ROLE ADMIN
    Route::middleware(['role:admin'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        //PETANI
        Route::prefix('petani')->name('farmer.')->group(function () {

            Route::get('/', 'FarmerController@index')->name('index');
            Route::get('/create', 'FarmerController@create')->name('create');
            Route::post('/create', 'FarmerController@store')->name('store');
            Route::get('/edit/{id}', 'FarmerController@edit')->name('edit');
            Route::post('/edit/{id}', 'FarmerController@update')->name('update');
            Route::get('/delete/{id}', 'FarmerController@destroy')->name('destroy');
        });
        //ALAT
        Route::prefix('alat')->name('tool.')->group(function () {

            Route::get('/', 'ToolController@index')->name('index');
            Route::get('/create', 'ToolController@create')->name('create');
            Route::post('/create', 'ToolController@store')->name('store');
            Route::get('/edit/{id}', 'ToolController@edit')->name('edit');
            Route::post('/edit/{id}', 'ToolController@update')->name('update');
            Route::get('/delete/{id}', 'ToolController@destroy')->name('destroy');
        });
        //SUBSIDI
        Route::prefix('subsidi')->name('subsidy.')->group(function () {

            Route::get('/', 'SubsidyController@index')->name('index');
            Route::get('/create', 'SubsidyController@create')->name('create');
            Route::post('/create', 'SubsidyController@store')->name('store');
            Route::get('/show/{id}', 'SubsidyController@show')->name('show');
            Route::get('/process/{subsidy}/{farmer}', 'SubsidyController@process')->name('process');

            Route::get('/edit/{id}', 'SubsidyController@edit')->name('edit');
            Route::post('/edit/{id}', 'SubsidyController@update')->name('update');
            Route::get('/delete/{id}', 'SubsidyController@destroy')->name('destroy');
        });
        //PENEYEWAAN
        Route::prefix('penyewaan')->name('rent.')->group(function () {

            Route::get('/', 'RentController@index')->name('index');
            Route::get('/show/{id}', 'RentController@show')->name('show');
            Route::get('/approve/{id}', 'RentController@approve')->name('approve');
        });
    });

    //ROLE PETANI
    Route::middleware(['role:petani'])->prefix('petani')->namespace('Petani')->name('petani.')->group(function () {
        //PRODUK
        Route::prefix('produk')->name('product.')->group(function () {

            Route::get('/', 'ProductController@index')->name('index');
        });
        //KERANJANG
        Route::prefix('cart')->name('cart.')->group(function () {

            Route::get('/', 'CartController@index')->name('index');
            Route::get('/add-to-cart', 'CartController@addToCart')->name('addToCart');
            Route::get('/delete-from-cart/{id}', 'CartController@deleteFromCart')->name('deleteFromCart');
            Route::get('/checkout', 'CartController@checkout')->name('checkout');
        });
        //PESANAN PRODUK
        Route::prefix('pesanan')->name('order.')->group(function () {

            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/show/{id}', 'OrderController@show')->name('show');
        });
        //SUBSIDI
        Route::prefix('subsidi')->name('subsidy.')->group(function () {

            Route::get('/', 'SubsidyController@index')->name('index');
            Route::get('/show/{id}', 'SubsidyController@show')->name('show');
        });
        //ALAT
        Route::prefix('alat')->name('tool.')->group(function () {

            Route::get('/', 'ToolController@index')->name('index');
            Route::get('/show/{id}', 'ToolController@show')->name('show');
        });
        //PENYEWAAN ALAT
        Route::prefix('penyewaan')->name('rent.')->group(function () {

            Route::get('/', 'RentController@index')->name('index');
            Route::get('/show/{id}', 'RentController@show')->name('show');
        });
    });
});

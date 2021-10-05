<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', 'DashboardController@index')->middleware(['auth'])->name('home');

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
        //EDUKASI & PENGENDALIAN
        Route::prefix('edukasi')->name('education.')->group(function () {

            Route::get('/', 'EducationController@index')->name('index');
            Route::get('/create', 'EducationController@create')->name('create');
            Route::post('/create', 'EducationController@store')->name('store');
            Route::get('/edit/{id}', 'EducationController@edit')->name('edit');
            Route::post('/edit/{id}', 'EducationController@update')->name('update');
            Route::get('/delete/{id}', 'EducationController@destroy')->name('destroy');
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
        //LAPORAN SEWA ALAT
        Route::prefix('laporan-alat')->name('report.')->group(function () {

            Route::get('/', 'ReportController@index')->name('index');
        });
        //JASA BURUH & PEMBELI PADI
        Route::prefix('pembeli')->name('buyer.')->group(function () {

            Route::get('/', 'BuyerController@index')->name('index');
            Route::get('/create', 'BuyerController@create')->name('create');
            Route::post('/create', 'BuyerController@store')->name('store');
            Route::get('/edit/{id}', 'BuyerController@edit')->name('edit');
            Route::post('/edit/{id}', 'BuyerController@update')->name('update');
            Route::get('/delete/{id}', 'BuyerController@destroy')->name('destroy');
        });
        Route::prefix('buruh-tani')->name('farm-worker.')->group(function () {

            Route::get('/', 'FarmWorkerController@index')->name('index');
            Route::get('/create', 'FarmWorkerController@create')->name('create');
            Route::post('/create', 'FarmWorkerController@store')->name('store');
            Route::get('/edit/{id}', 'FarmWorkerController@edit')->name('edit');
            Route::post('/edit/{id}', 'FarmWorkerController@update')->name('update');
            Route::get('/delete/{id}', 'FarmWorkerController@destroy')->name('destroy');
        });
        //JADWAL RAPAT
        Route::prefix('rapat')->name('meeting.')->group(function () {

            Route::get('/', 'MeetingController@index')->name('index');
            Route::get('/create', 'MeetingController@create')->name('create');
            Route::post('/create', 'MeetingController@store')->name('store');
            Route::get('/edit/{id}', 'MeetingController@edit')->name('edit');
            Route::post('/edit/{id}', 'MeetingController@update')->name('update');
            Route::get('/delete/{id}', 'MeetingController@destroy')->name('destroy');
        });
        //JADWAL MENANAM
        Route::prefix('menanam')->name('plant.')->group(function () {

            Route::get('/', 'PlantController@index')->name('index');
            Route::get('/create', 'PlantController@create')->name('create');
            Route::post('/create', 'PlantController@store')->name('store');
            Route::get('/edit/{id}', 'PlantController@edit')->name('edit');
            Route::post('/edit/{id}', 'PlantController@update')->name('update');
            Route::get('/delete/{id}', 'PlantController@destroy')->name('destroy');
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
        //EDUKASI & PENGENDALIAN
        Route::prefix('informasi')->name('information.')->group(function () {

            Route::get('/education', 'InformationController@education')->name('education');
            Route::get('/plant', 'InformationController@plant')->name('plant');
            Route::get('/meeting', 'InformationController@meeting')->name('meeting');
        });

        Route::prefix('jasa')->name('service.')->group(function () {

            Route::get('/farm-worker', 'ServiceController@farmWorker')->name('farm-worker');
            Route::get('/buyer', 'ServiceController@buyer')->name('buyer');
        });
        Route::prefix('galeri')->name('galery.')->group(function () {
            //FOTP
            Route::get('/', 'GaleryController@index')->name('index');

            Route::get('/create', 'GaleryController@createFoto')->name('create');
            Route::post('/create', 'GaleryController@storeFoto')->name('store');
            Route::get('/edit/{id}', 'GaleryController@editFoto')->name('edit');
            Route::post('/edit/{id}', 'GaleryController@updateFoto')->name('update');
            // Route::get('/delete/{id}', 'GaleryController@destroy')->name('destroy');

            //VIDEO YOUTUBE
            Route::get('/create-video', 'GaleryController@createVideo')->name('create-video');
            Route::post('/create-video', 'GaleryController@storeVideo')->name('store-video');
            Route::get('/edit-video/{id}', 'GaleryController@editVideo')->name('edit-video');
            Route::post('/edit-video/{id}', 'GaleryController@updateVideo')->name('update-video');
        });
    });
});

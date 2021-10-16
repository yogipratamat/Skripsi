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
            Route::get('/edit/{id_group_farm}', 'GroupFarmController@edit')->name('edit');
            Route::post('/edit/{id_group_farm}', 'GroupFarmController@update')->name('update');
            Route::get('/delete/{id_group_farm}', 'GroupFarmController@destroy')->name('destroy');
        });
        //PRODUK
        Route::prefix('produk')->name('product.')->group(function () {

            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/create', 'ProductController@store')->name('store');
            Route::get('/edit/{id_product}', 'ProductController@edit')->name('edit');
            Route::post('/edit/{id_product}', 'ProductController@update')->name('update');
            Route::get('/delete/{id_product}', 'ProductController@destroy')->name('destroy');
        });
        //PESANAN PRODUK
        Route::prefix('pesanan')->name('order.')->group(function () {

            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/show/{id_order}', 'OrderController@show')->name('show');
            Route::get('/approve/{id_order}', 'OrderController@approve')->name('approve');
            Route::get('/accept/{id_order}', 'OrderController@accept')->name('accept');
        });
        Route::prefix('cetak-pesanan')->name('cetakorder.')->group(function () {

            Route::get('/{id_order}', 'CetakOrderController@index')->name('index');
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
            Route::get('/edit/{id_education}', 'EducationController@edit')->name('edit');
            Route::post('/edit/{id_education}', 'EducationController@update')->name('update');
            Route::get('/delete/{id_education}', 'EducationController@destroy')->name('destroy');
        });
    });

    //ROLE ADMIN
    Route::middleware(['role:admin'])->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
        //PETANI
        Route::prefix('petani')->name('farmer.')->group(function () {

            Route::get('/', 'FarmerController@index')->name('index');
            Route::get('/create', 'FarmerController@create')->name('create');
            Route::post('/create', 'FarmerController@store')->name('store');
            Route::get('/edit/{id_farmer}', 'FarmerController@edit')->name('edit');
            Route::post('/edit/{id_farmer}', 'FarmerController@update')->name('update');
            Route::get('/delete/{id_farmer}', 'FarmerController@destroy')->name('destroy');
        });

        Route::prefix('absen')->name('absen.')->group(function () {

            Route::get('/', 'AbsenController@index')->name('index');
        });
        //ALAT
        Route::prefix('alat')->name('tool.')->group(function () {

            Route::get('/', 'ToolController@index')->name('index');
            Route::get('/create', 'ToolController@create')->name('create');
            Route::post('/create', 'ToolController@store')->name('store');
            Route::get('/edit/{id_tool}', 'ToolController@edit')->name('edit');
            Route::post('/edit/{id_tool}', 'ToolController@update')->name('update');
            Route::get('/delete/{id_tool}', 'ToolController@destroy')->name('destroy');
        });
        //SUBSIDI
        Route::prefix('subsidi')->name('subsidy.')->group(function () {

            Route::get('/', 'SubsidyController@index')->name('index');
            Route::get('/create', 'SubsidyController@create')->name('create');
            Route::post('/create', 'SubsidyController@store')->name('store');
            Route::get('/show/{id_subsidy}', 'SubsidyController@show')->name('show');
            Route::get('/process/{subsidy}/{farmer}', 'SubsidyController@process')->name('process');


            Route::get('/edit/{id_subsidy}', 'SubsidyController@edit')->name('edit');
            Route::post('/edit/{id_subsidy}', 'SubsidyController@update')->name('update');
            Route::get('/delete/{id_subsidy}', 'SubsidyController@destroy')->name('destroy');
        });
        Route::prefix('cetak')->name('cetaksubsidy.')->group(function () {

            Route::get('/{id_subsidy}/{id_farmer}', 'CetakSubsidyController@index')->name('index');
        });
        //PENEYEWAAN
        Route::prefix('penyewaan')->name('rent.')->group(function () {

            Route::get('/', 'RentController@index')->name('index');
            Route::get('/show/{id_rent}', 'RentController@show')->name('show');
            Route::get('/approve/{id_rent}', 'RentController@approve')->name('approve');
            Route::get('/cancel/{id_rent}', 'RentController@cancel')->name('cancel');
        });
        Route::prefix('cetak')->name('cetaksewaalat.')->group(function () {

            Route::get('/{id_rent}', 'CetakSewaAlatController@index')->name('index');
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
            Route::get('/edit/{id_buyer}', 'BuyerController@edit')->name('edit');
            Route::post('/edit/{id_buyer}', 'BuyerController@update')->name('update');
            Route::get('/delete/{id_buyer}', 'BuyerController@destroy')->name('destroy');
        });
        Route::prefix('buruh-tani')->name('farm-worker.')->group(function () {

            Route::get('/', 'FarmWorkerController@index')->name('index');
            Route::get('/create', 'FarmWorkerController@create')->name('create');
            Route::post('/create', 'FarmWorkerController@store')->name('store');
            Route::get('/edit/{id_farm_worker}', 'FarmWorkerController@edit')->name('edit');
            Route::post('/edit/{id_farm_worker}', 'FarmWorkerController@update')->name('update');
            Route::get('/delete/{id_farm_worker}', 'FarmWorkerController@destroy')->name('destroy');
        });
        //JADWAL RAPAT
        Route::prefix('rapat')->name('meeting.')->group(function () {

            Route::get('/', 'MeetingController@index')->name('index');
            Route::get('/create', 'MeetingController@create')->name('create');
            Route::post('/create', 'MeetingController@store')->name('store');
            Route::get('/edit/{id_meeting}', 'MeetingController@edit')->name('edit');
            Route::post('/edit/{id_meeting}', 'MeetingController@update')->name('update');
            Route::get('/delete/{id_meeting}', 'MeetingController@destroy')->name('destroy');
        });
        //JADWAL MENANAM
        Route::prefix('menanam')->name('plant.')->group(function () {

            Route::get('/', 'PlantController@index')->name('index');
            Route::get('/create', 'PlantController@create')->name('create');
            Route::post('/create', 'PlantController@store')->name('store');
            Route::get('/edit/{id_plant}', 'PlantController@edit')->name('edit');
            Route::post('/edit/{id_plant}', 'PlantController@update')->name('update');
            Route::get('/delete/{id_plant}', 'PlantController@destroy')->name('destroy');
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
            Route::get('/show/{id_order}', 'OrderController@show')->name('show');
        });
        //SUBSIDI
        Route::prefix('subsidi')->name('subsidy.')->group(function () {

            Route::get('/', 'SubsidyController@index')->name('index');
            Route::get('/show/{id_subsidy}', 'SubsidyController@show')->name('show');
        });
        //ALAT
        Route::prefix('alat')->name('tool.')->group(function () {

            Route::get('/', 'ToolController@index')->name('index');
            Route::get('/show/{id_tool}', 'ToolController@show')->name('show');
        });
        //PENYEWAAN ALAT
        Route::prefix('penyewaan')->name('rent.')->group(function () {

            Route::get('/', 'RentController@index')->name('index');
            Route::get('/show/{id_rent}', 'RentController@show')->name('show');
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
    });
});

<?php

use App\Http\Controllers\Admin\LoginSocialController;
use App\Http\Controllers\Home\HomeBlogController;
use App\Http\Controllers\Home\HomeCartController;
use App\Http\Controllers\Home\HomeCheckoutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\HomeCustomerController;
use App\Http\Controllers\Home\HomeProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('')->name('home.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::prefix('thucdon')->name('thucdon.')->group(function () {
        Route::get('', [HomeProductController::class, 'index'])->name('index');
        Route::get('/{pro_slug}', [HomeProductController::class, 'details_product'])->name('details');
    });

    Route::prefix('gio-hang')->name('cart.')->group(function () {
        Route::get('/', [HomeCartController::class, 'index'])->name('index');
        Route::post('add', [HomeCartController::class, 'addCart'])->name('add');
        Route::post('update', [HomeCartController::class, 'updateCart'])->name('update');
        Route::get('delete/{session_id}', [HomeCartController::class, 'deleteCart'])->name('delete');
    });

    Route::prefix('thuc-don')->name('thucdon.')->group(function () {
        Route::get('/', [HomeCartController::class, 'index'])->name('index');
        Route::post('add', [HomeCartController::class, 'addCart'])->name('add');
        Route::post('update', [HomeCartController::class, 'updateCart'])->name('update');
        Route::get('delete/{session_id}', [HomeCartController::class, 'deleteCart'])->name('delete');
    });

    Route::prefix('thanh-toan')->name('thanhtoan.')->group(function () {
        Route::get('/', [HomeCheckoutController::class, 'index'])->name('index');
        Route::post('add', [HomeCheckoutController::class, 'addCart'])->name('add');
        Route::post('update', [HomeCheckoutController::class, 'updateCart'])->name('update');
        Route::get('delete/{session_id}', [HomeCheckoutController::class, 'deleteCart'])->name('delete');

        Route::post('/store', [HomeCheckoutController::class, 'createOrder'])->name('createOder');
        Route::post('/store-vnpay', [HomeCheckoutController::class, 'createVNPay'])->name('createVNPay');
        Route::get('/returnVnpay', [HomeCheckoutController::class, 'returnVNPay'])->name('returnVNPay');
        Route::post('/store-momo', [HomeCheckoutController::class, 'createMomo'])->name('createMomo');
        Route::get('/returnMomo', [HomeCheckoutController::class, 'returnMomo'])->name('returnMomo');
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [HomeBlogController::class, 'index'])->name('index');
        Route::get('/{id}', [HomeBlogController::class, 'detailsPost'])->name('details');

    });



    Route::prefix('dang-nhap')->name('dangnhap.')->group(function () {
        Route::get('/', [HomeCheckoutController::class, 'loginCustomer'])->name('index');
        Route::post('/', [HomeCheckoutController::class, 'loginCustomerAuth']);
    });

    Route::prefix('dang-ky')->name('dangky.')->group(function () {
        Route::get('/', [HomeCheckoutController::class, 'registerCustomer'])->name('index');
        Route::post('/', [HomeCheckoutController::class, 'saveRegisterCustomerAuth']);

        Route::prefix('google')->name('google.')->group( function(){
            Route::get('auth', [LoginSocialController::class, 'loginUserUsingGoogle'])->name('login');
            Route::get('callback', [LoginSocialController::class, 'callbackUserFromGoogle'])->name('callback');
        });
    });

    Route::get('dang-xuat', [HomeCheckoutController::class, 'logoutCustomerAuth'])->name('logout');








});

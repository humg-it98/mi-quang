<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPostCategoriesController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProCategoriesController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\createPermissionUserController;
use App\Http\Controllers\User\RolesUserHomeController;
use App\Http\Controllers\User\UserHomeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    Route::get('login', [AdminLoginController::class, 'loginAuth'])->middleware('guest')->name('login');
    Route::post('login', [AdminLoginController::class, 'postLoginAdmin'])->name('loginAuth')->middleware('guest');
    Route::get('logout', [AdminLoginController::class, 'logoutAdmin'])->name('logout.admin');

});

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'admin-miquang'], function () {
        Route::get('/', [AdminHomeController::class,'index'])->name('admin.index');

        Route::prefix('about')->name('about.')->group(function () {
            Route::get('/', [AdminAboutController::class, 'index'])->name('index')->middleware('can:about-list');
            Route::get('/create', [AdminAboutController::class, 'create'])->name('create')->middleware('can:about-add');
            Route::post('/store', [AdminAboutController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminAboutController::class, 'edit'])->name('edit')->middleware('can:about-edit');
            Route::put('/update/{id}', [AdminAboutController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminAboutController::class, 'destroy'])->name('destroy')->middleware('can:about-del');

        });

        Route::prefix('galleries')->name('galleries.')->group(function () {
            Route::get('/', [AdminGalleryController::class, 'index'])->name('index')->middleware('can:galleries-list');
            Route::get('/create', [AdminGalleryController::class, 'create'])->name('create')->middleware('can:galleries-add');
            Route::post('/store', [AdminGalleryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminGalleryController::class, 'edit'])->name('edit')->middleware('can:galleries-edit');
            Route::put('/update/{id}', [AdminGalleryController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminGalleryController::class, 'destroy'])->name('destroy')->middleware('can:galleries-del');

        });

        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [AdminProductsController::class, 'index'])->name('index')->middleware('can:products-list');
            Route::get('/create', [AdminProductsController::class, 'create'])->name('create')->middleware('can:products-add');
            Route::post('/store', [AdminProductsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminProductsController::class, 'edit'])->name('edit')->middleware('can:products-edit');
            Route::put('/update/{id}', [AdminProductsController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminProductsController::class, 'destroy'])->name('destroy')->middleware('can:products-del');

        });

        Route::prefix('productcategories')->name('procategories.')->group(function () {
            Route::get('/', [AdminProCategoriesController::class, 'index'])->name('index')->middleware('can:procategories-list');
            Route::get('/create', [AdminProCategoriesController::class, 'create'])->name('create')->middleware('can:procategories-add');
            Route::post('/store', [AdminProCategoriesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminProCategoriesController::class, 'edit'])->name('edit')->middleware('can:procategories-edit');
            Route::put('/update/{id}', [AdminProCategoriesController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminProCategoriesController::class, 'destroy'])->name('destroy')->middleware('can:procategories-del');

        });


        Route::prefix('slider')->name('slider.')->group(function () {
            Route::get('/', [AdminSliderController::class, 'index'])->name('index')->middleware('can:slider-list');
            Route::get('/create', [AdminSliderController::class, 'create'])->name('create')->middleware('can:slider-add');
            Route::post('/store', [AdminSliderController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('edit')->middleware('can:slider-edit');
            Route::put('/update/{id}', [AdminSliderController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminSliderController::class, 'destroy'])->name('destroy')->middleware('can:slider-del');

        });

        Route::prefix('menu')->name('menu.')->group(function () {
            Route::get('/', [AdminMenuController::class, 'index'])->name('index')->middleware('can:menu-list');
            Route::get('/create', [AdminMenuController::class, 'create'])->name('create')->middleware('can:menu-add');
            Route::post('/store', [AdminMenuController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminMenuController::class, 'edit'])->name('edit')->middleware('can:menu-edit');
            Route::put('/update/{id}', [AdminMenuController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminMenuController::class, 'destroy'])->name('destroy')->middleware('can:menu-del');

        });

        Route::prefix('permission')->name('permission.')->group(function () {
            Route::get('/permission', [createPermissionUserController::class, 'permission'])->name('create');
            Route::post('/permission-add', [createPermissionUserController::class, 'permission_add'])->name('store');
        });

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserHomeController::class, 'index'])->name('index')->middleware('can:user-list');
            Route::get('/create', [UserHomeController::class, 'create'])->name('create')->middleware('can:user-add');
            Route::post('/store', [UserHomeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserHomeController::class, 'edit'])->name('edit')->middleware('can:user-edit');
            Route::put('/update/{id}', [UserHomeController::class, 'update'])->name('update');
            Route::get('/del/{id}', [UserHomeController::class, 'destroy'])->name('destroy')->middleware('can:user-del');

        });

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RolesUserHomeController::class, 'index'])->name('index')->middleware('can:role-list');
            Route::get('/create', [RolesUserHomeController::class, 'create'])->name('create')->middleware('can:role-add');
            Route::post('/store', [RolesUserHomeController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RolesUserHomeController::class, 'edit'])->name('edit')->middleware('can:role-edit');
            Route::put('/update/{id}', [RolesUserHomeController::class, 'update'])->name('update');
            Route::get('/del/{id}', [RolesUserHomeController::class, 'destroy'])->name('destroy')->middleware('can:role-del');
        });

        Route::prefix('post')->name('posts.')->group(function () {
            Route::get('/', [AdminPostController::class, 'index'])->name('index')->middleware('can:post-list');
            Route::get('/create', [AdminPostController::class, 'create'])->name('create')->middleware('can:post-add');
            Route::post('/store', [AdminPostController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('edit')->middleware('can:post-edit');
            Route::put('/update/{id}', [AdminPostController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminPostController::class, 'destroy'])->name('destroy')->middleware('post:role-del');
        });

        Route::prefix('postcategories')->name('postcategories.')->group(function () {
            Route::get('/', [AdminPostCategoriesController::class, 'index'])->name('index')->middleware('can:postcategories-list');
            Route::get('/create', [AdminPostCategoriesController::class, 'create'])->name('create')->middleware('can:postcategories-add');
            Route::post('/store', [AdminPostCategoriesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdminPostCategoriesController::class, 'edit'])->name('edit')->middleware('can:postcategories-edit');
            Route::put('/update/{id}', [AdminPostCategoriesController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminPostCategoriesController::class, 'destroy'])->name('destroy')->middleware('post:postcategories-del');
        });

        Route::prefix('order')->name('orders.')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminOrderController::class, 'update'])->name('update');
            Route::get('/del/{id}', [AdminOrderController::class, 'destroy'])->name('destroy')->middleware('post:role-del');
        });

    });
});

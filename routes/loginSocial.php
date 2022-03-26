<?php


use App\Http\Controllers\Admin\LoginSocialController;
use Illuminate\Support\Facades\Route;

    Route::prefix('socialite')->group( function(){
    // Facebook Login URL
        Route::prefix('facebook')->name('facebook.')->group( function(){
        Route::get('auth', [LoginSocialController::class, 'loginUsingFacebook'])->name('login');
        Route::get('callback', [LoginSocialController::class, 'callbackFromFacebook'])->name('callback');
        });

        // GitHub Login URL
        Route::prefix('github')->name('github.')->group( function(){
        Route::get('auth', [LoginSocialController::class, 'loginUsingGitHub'])->name('login');
        Route::get('callback', [LoginSocialController::class, 'callbackFromGitHub'])->name('callback');
        });

        // Google login URL
        Route::prefix('google')->name('google.')->group( function(){
        Route::get('auth', [LoginSocialController::class, 'loginUsingGoogle'])->name('login');
        Route::get('callback', [LoginSocialController::class, 'callbackFromGoogle'])->name('callback');
        });
    });

<?php

use Illuminate\Support\Facades\Route;




Route::prefix('auth')->namespace('Auth')->name('auth.')->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@login');
    });

    Route::middleware('auth')->group(function(){
        Route::get('logout','LogoutController')->name("logout");
        Route::get('switch','LoginController@switch')->name('switch');
    });
});

Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
});

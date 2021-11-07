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
    Route::prefix('{etablissement}')->group(function(){
        Route::get('/', 'HomeController@index')->name('index');

        // gestion des ressources 

        // ajout et liste des eleves
        Route::prefix('student')->name('student.')->namespace('Eleves')->group(function(){
            Route::get('/','ElevesController@index')->name('index');
            Route::get('/add','ElevesController@create')->name('add');
            Route::post('/add','ElevesController@store');
            Route::prefix('{eleve}')->group(function(){
                Route::get('/show','ElevesController@show')->name('show');
                Route::get('/edit','ElevesController@edit')->name('edit');
                Route::post('/edit','ElevesController@update');
            });
        });

        // ajout et listes des cycles
        Route::prefix('cycles')->name('cycles.')->namespace('Cycles')->group(function(){
            Route::get('/','CyclesController@index')->name('index');
            Route::get('/add','CyclesController@create')->name('add');
            Route::post('/add','CyclesController@store');
            Route::prefix('{cycle}')->group(function(){
                Route::get('/show','CyclesController@show')->name('show');
                Route::get('/edit','CyclesController@edit')->name('edit');
                Route::post('/edit','CyclesController@update');
                Route::get('/delete','CyclesController@delete')->name('delete');
            });
        });
    });
});

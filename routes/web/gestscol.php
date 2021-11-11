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

        // ajout et listes des Niveau
        Route::prefix('niveaux')->name('niveaux.')->namespace('Niveau')->group(function(){
            Route::get('/','NiveauController@index')->name('index');
            Route::get('/add','NiveauController@create')->name('add');
            Route::post('/add','NiveauController@store');
            Route::prefix('{niveau}')->group(function(){
                Route::get('/show','NiveauController@show')->name('show');
                Route::get('/edit','NiveauController@edit')->name('edit');
                Route::post('/edit','NiveauController@update');
                Route::get('/delete','NiveauController@delete')->name('delete');
            });
        });

         // ajout et listes des Classes
         Route::prefix('classes')->name('classes.')->namespace('Classes')->group(function(){
            Route::get('/','ClassesController@index')->name('index');
            Route::get('/add','ClassesController@create')->name('add');
            Route::post('/add','ClassesController@store');
            Route::prefix('{classe}')->group(function(){
                Route::get('/show','ClassesController@show')->name('show');
                Route::get('/edit','ClassesController@edit')->name('edit');
                Route::post('/edit','ClassesController@update');
                Route::get('/delete','ClassesController@delete')->name('delete');
            });
        });

          // ajout et listes des matières
          Route::prefix('matiere')->name('matieres.')->namespace('Matieres')->group(function(){
            Route::get('/','MatieresController@index')->name('index');
            Route::get('/add','MatieresController@create')->name('add');
            Route::post('/add','MatieresController@store');
            Route::prefix('{classe}')->group(function(){
                Route::get('/show','MatieresController@show')->name('show');
                Route::get('/edit','MatieresController@edit')->name('edit');
                Route::post('/edit','MatieresController@update');
                Route::get('/delete','MatieresController@delete')->name('delete');
            });
        });

    });
});

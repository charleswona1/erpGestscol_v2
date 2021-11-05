<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/','/gestscol');

/* Accès à l'espace gestscol */
Route::prefix('gestscol')
     ->namespace('Gestscol')
     ->name('gestscol.')
     ->group(__DIR__ . '/web/gestscol.php');

/* Accès à l'espace d'administration */
Route::prefix('admin')
     ->namespace('Admin')
     ->name('admin.')
     ->group(__DIR__ . '/web/admin.php');

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('etablissement')->namespace('Etablissement')->group(function(){
    Route::post('add-admin','AdminEtablissementsController@storeAdmin');
});

<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/logout-temp',function(){
    Auth::logout();
});
Route::get('/{any}', 'AppController@index')->where('any','.*');


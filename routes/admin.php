<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('users/list', 'UsersController@index')->name('index');

    
});

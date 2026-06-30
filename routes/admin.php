<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.'], function () {

    Route::get('users/list', [UsersController::class, 'index'])->name('index');


});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Auth\SocialiteController;

Route::middleware('guest')->group(function () {
    // ...
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])
        ->name('socialite.auth');
 
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])
        ->name('socialite.callback');
});
// ...
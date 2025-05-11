<?php

use App\Http\Controllers\Admin\TestBreweriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

Route::get('/test-breweries', [TestBreweriesController::class, 'index'])->middleware('auth')->name('testbreweries');
Route::get('/test-breweries/api-docs', function() {
    return view('admin.api-docs');
})->middleware('auth')->name('api-docs');


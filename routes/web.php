<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\CBController;
use App\Models\User;

Route::get('/', function () {

    $cachedValue = Cache::remember('count', 20, function(){
        return User::count();
    });

    $total  = User::count();
    return '<h1>cached total is :' . $cachedValue . '</br>real total is :' . $total. '</h1>';

    

});

Route::prefix('cb')->name('cb.')->group(function () {
    Route::get('/', [CBController::class, 'index'])->name('index');
    Route::get('/create', [CBController::class, 'create'])->name('create');
    Route::post('/', [CBController::class, 'store'])->name('store');
});


<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\CBController;

Route::get('/', function () {

    // Store a value in the cache
    // Cache for 10 seconds
    Cache::put('test_key', 'test_value', 10);

    // Retrieve the value from the cache
    $value = Cache::get('test_key');

    return $value;
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [CBController::class, 'index'])->name('index');
    Route::get('/create', [CBController::class, 'create'])->name('create');
    Route::post('/', [CBController::class, 'store'])->name('store');
});


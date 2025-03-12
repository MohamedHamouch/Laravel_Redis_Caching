<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-redis-cache', function () {
    
    // Store a value in the cache
    Cache::put('test_key', 'test_value', 0.5); // Cache for 10 minutes

    // Retrieve the value from the cache
    $value = Cache::get('test_key');

    return $value; // Should return 'test_value'
});
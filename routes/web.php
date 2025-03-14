<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\CBController;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
Route::get('/', function () {

    $count = Cache::remember('count', 30, function(){
        return User::count();
    });

    $liveCount = User::count();
    return "<h1>Cached count: $count </br>Live count: $liveCount</h1>";


})->name('home');


Route::prefix('cb')->name('cb.')->group(function () {
    Route::get('/', [CBController::class, 'index'])->name('index');
    Route::get('/create', [CBController::class, 'create'])->name('create');
    Route::post('/', [CBController::class, 'store'])->name('store');
});

Route::get('/add', function () {
    User::create([
        'name' => 'Test',
        'role' => 'Test',
        'image' => 'Test',
    ]);
    return redirect()->route('home');
});

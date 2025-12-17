<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ROuting untuk barang
Route::get('items', [ItemController::class, 'index'])
->name('item.index');

Route::get('items/create', [ItemController::class, 'create'])
->name('item.create');

Route::post('items', [ItemController::class, 'store'])
->name('item.store');

Route::get('items/{param}', [ItemController::class, 'detail'])
->name('item.detail');


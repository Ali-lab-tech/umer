<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OutgoingProductController;

Route::resource('products', ProductController::class);
Route::resource('outgoing_products', OutgoingProductController::class);
Route::resource('history', \App\Http\Controllers\HistoryController::class);

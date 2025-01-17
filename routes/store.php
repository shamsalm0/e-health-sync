<?php

use App\Http\Controllers\Admin\Store\StoreProductCategoryController;
use App\Http\Controllers\Admin\Store\StoreProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('store')->middleware(['auth'])->name('store.')->group(function () {
    Route::resources([
        'product' => StoreProductController::class,
        'product-category' => StoreProductCategoryController::class,
    ]);
});

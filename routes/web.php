<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdminMiddleWare;
use App\Http\Middleware\IsStaffMiddleWare;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource("products","App\Http\Controllers\ProductController");
    Route::resource("categories","App\Http\Controllers\CategoryController");
    Route::get("product/increase-quantity/{id}","App\Http\Controllers\ProductController@incQuantity");
    Route::get("product/decrease-quantity/{id}","App\Http\Controllers\ProductController@decQuantity");
    Route::get("product/{id}/trash","App\Http\Controllers\ProductController@trashProduct");
    Route::get("product/{id}/publish","App\Http\Controllers\ProductController@publishProduct");

});






require __DIR__.'/auth.php';

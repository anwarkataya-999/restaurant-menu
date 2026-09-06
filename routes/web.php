<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuItemController;

Route::get('/', function () {
    return view('welcome');
});


// =========================
// Category Management
// =========================

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');


// =========================
// Menu Items Management
// =========================

Route::get('/menu-items', [MenuItemController::class, 'index'])
    ->name('menu-items.index');

Route::get('/menu-items/create', [MenuItemController::class, 'create'])
    ->name('menu-items.create');

Route::post('/menu-items', [MenuItemController::class, 'store'])
    ->name('menu-items.store');

Route::get('/menu-items/{menuItem}/edit', [MenuItemController::class, 'edit'])
    ->name('menu-items.edit');

Route::put('/menu-items/{menuItem}', [MenuItemController::class, 'update'])
    ->name('menu-items.update');

Route::delete('/menu-items/{menuItem}', [MenuItemController::class, 'destroy'])
    ->name('menu-items.destroy');
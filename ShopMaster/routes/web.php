<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Rout

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])
    ->name('products.show');

// Admin Panel Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'can:admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        // Products CRUD
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);

        // Categories CRUD
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        // Orders Management
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);

        // Users Management
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);

        // Reports & Analytics
        Route::get('/reports/sales', [App\Http\Controllers\Admin\ReportController::class, 'sales'])
            ->name('reports.sales');

        Route::get('/reports/inventory', [App\Http\Controllers\Admin\ReportController::class, 'inventory'])
            ->name('reports.inventory');

        // Settings
        Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])
            ->name('settings');
    });

// API Routes (Sanctum)
Route::prefix('api')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('products', App\Http\Controllers\Api\ProductController::class);
        Route::apiResource('categories', App\Http\Controllers\Api\CategoryController::class);
    });

// Authentication Routes (Breeze)
require __DIR__.'/auth.php';

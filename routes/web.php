<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'frontend::home.index')->name('home');

Route::middleware(['auth', 'verified'])->group(function ($route) {
    Route::prefix('admin')->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('permission:view_admin/dashboard');;
        Route::livewire('menus', 'pages::menus.index')->name('menus.index')->middleware('permission:view_admin/menus');;
        Route::livewire('permissions', 'pages::permission.index')->name('permissions.index')->middleware('permission:view_admin/permissions');
        Route::livewire('roles', 'pages::roles.index')->name('roles.index')->middleware('permission:view_admin/roles');

        Route::livewire('kategori', 'pages::kategori.index')->name('kategori.index')->middleware('permission:view_admin/kategori');
        Route::livewire('produk', 'pages::produk.index')->name('produk.index')->middleware('permission:view_admin/produk');
    });
});



require __DIR__ . '/settings.php';

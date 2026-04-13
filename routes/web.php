<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function ($route) {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('menus', 'pages::menus.index')->name('menus.index');
    Route::livewire('permission', 'pages::permission.index')->name('permission.index');
    Route::livewire('roles', 'pages::roles.index')->name('roles.index');
});



require __DIR__ . '/settings.php';

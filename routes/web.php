<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['access.admin'])->prefix('admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    });
    Route::middleware(['access.client'])->prefix('chief')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'client'])->name('client.dashboard');
    });
    Route::middleware(['access.developer'])->group(function() {
        Route::get('/', [DashboardController::class, 'developer'])->name('developer.dashboard');
    });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

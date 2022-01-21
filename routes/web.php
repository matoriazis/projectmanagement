<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ClientController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth'])->group(function () {
    Route::middleware(['access.admin'])->prefix('admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/tickets', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/tickets/create', [TicketController::class, 'create'])->name('admin.ticket.editor');
        Route::get('/project', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('admin.project.editor');
        Route::get('/developer', [DeveloperController::class, 'index'])->name('admin.developer.index');
        Route::get('/developer/create', [DeveloperController::class, 'create'])->name('admin.developer.editor');
        Route::get('/client', [ClientController::class, 'index'])->name('admin.client.index');
        Route::get('/client/create', [ClientController::class, 'create'])->name('admin.client.editor');
    });
    Route::middleware(['access.client'])->prefix('client')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'client'])->name('client.dashboard');
    });
    Route::middleware(['access.developer'])->group(function() {
        Route::get('/', [DashboardController::class, 'developer'])->name('developer.dashboard');
        Route::get('/ticket', [DeveloperController::class, 'ticket'])->name('developer.ticket.index');
        Route::get('/history', [DeveloperController::class, 'history'])->name('developer.history.index');
    });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['access.admin'])->prefix('admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::get('/tickets', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/tickets/create', [TicketController::class, 'create'])->name('admin.ticket.editor');
        Route::post('/tickets/create', [TicketController::class, 'store'])->name('admin.ticket.editor.store');

        Route::get('/project', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('admin.project.editor');
        Route::post('/project/create', [ProjectController::class, 'store'])->name('admin.project.editor.create');
        Route::get('/project/update-status/{id}', [ProjectController::class, 'markAsDone'])->name('admin.project.status.update');
        Route::post('/project/assign-dev', [ProjectController::class, 'assignDeveloper'])->name('admin.project.assign.dev.store');
        Route::get('/project/remove-dev', [ProjectController::class, 'removeAssignedDeveloper'])->name('admin.project.remove.dev');

        Route::get('/developer', [DeveloperController::class, 'index'])->name('admin.developer.index');
        Route::get('/developer/create', [DeveloperController::class, 'create'])->name('admin.developer.editor');
        Route::post('/developer/create', [DeveloperController::class, 'store'])->name('admin.developer.editor.create');

        Route::get('/client', [ClientController::class, 'index'])->name('admin.client.index');
        Route::get('/client/create', [ClientController::class, 'create'])->name('admin.client.editor');
        Route::post('/client/create', [ClientController::class, 'store'])->name('admin.client.editor.post');
        Route::get('/client/delete/{id}', [ClientController::class, 'destroy'])->name('admin.client.delete');
    });
    Route::middleware(['access.client'])->prefix('client')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'client'])->name('client.dashboard');
        Route::get('/ticket', [ClientController::class, 'ticket'])->name('client.ticket.index');
        Route::get('/developer', [ClientController::class, 'developer'])->name('client.developer.index');
        Route::get('/report', [ClientController::class, 'report'])->name('client.report.index');
    });
    Route::middleware(['access.developer'])->group(function() {
        Route::get('/', [DashboardController::class, 'developer'])->name('developer.dashboard');
        Route::get('/my-project', [DeveloperController::class, 'ticket'])->name('developer.ticket.index');
        Route::get('/history', [DeveloperController::class, 'history'])->name('developer.history.index');
    });
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

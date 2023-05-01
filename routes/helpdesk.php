<?php

use Illuminate\Support\Facades\Route;
use Rish0593\HelpDesk\Http\Controllers\Admin\TicketController;
use Rish0593\HelpDesk\Http\Controllers\Admin\TicketStatusController;
use Rish0593\HelpDesk\Http\Controllers\Admin\TicketCategoryController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('tickets')->name('tickets.categories.')->group(function () {
        Route::match(['get', 'post'], 'categories', [TicketCategoryController::class, 'index'])->name('index');
        Route::post('categories/add-or-update', [TicketCategoryController::class, 'addOrUpdate'])->name('add.or.update');
        Route::post('categories/trash', [TicketCategoryController::class, 'trash'])->name('trash');
    });

    Route::prefix('tickets')->name('tickets.status.')->group(function () {
        Route::match(['get', 'post'], 'status', [TicketStatusController::class, 'index'])->name('index');
        Route::post('status/add-or-update', [TicketStatusController::class, 'addOrUpdate'])->name('add.or.update');
        Route::post('status/trash', [TicketStatusController::class, 'trash'])->name('trash');
    });

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::post('list', [TicketController::class, 'list'])->name('list');
    });
});

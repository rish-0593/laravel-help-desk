<?php

use Illuminate\Support\Facades\Route;
use Rish0593\HelpDesk\Http\Controllers\Admin;
use Rish0593\HelpDesk\Http\Controllers\TicketController;


Route::match(['get', 'post'], 'ticket', [TicketController::class, 'index'])->name('ticket');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('tickets')->name('tickets.categories.')->group(function () {
        Route::match(['get', 'post'], 'categories', [Admin\TicketCategoryController::class, 'index'])->name('index');
        Route::post('categories/add-or-update', [Admin\TicketCategoryController::class, 'addOrUpdate'])->name('add.or.update');
        Route::post('categories/trash', [Admin\TicketCategoryController::class, 'trash'])->name('trash');
        Route::post('categories/update-status', [Admin\TicketCategoryController::class, 'updateStatus'])->name('update.status');
    });

    Route::prefix('tickets')->name('tickets.status.')->group(function () {
        Route::match(['get', 'post'], 'status', [Admin\TicketStatusController::class, 'index'])->name('index');
        Route::post('status/add-or-update', [Admin\TicketStatusController::class, 'addOrUpdate'])->name('add.or.update');
        Route::post('status/trash', [Admin\TicketStatusController::class, 'trash'])->name('trash');
        Route::post('status/update-status', [Admin\TicketStatusController::class, 'updateStatus'])->name('update.status');
    });

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::match(['get', 'post'], '/', [Admin\TicketController::class, 'index'])->name('index');
        Route::post('trash', [Admin\TicketController::class, 'trash'])->name('trash');
        Route::post('update-status', [Admin\TicketController::class, 'updateStatus'])->name('update.status');
    });
});

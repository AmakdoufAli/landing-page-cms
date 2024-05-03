<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/d-landing-pages', [AdminController::class, 'landingpages'])->name('lps');
    Route::get('/d-landing-pages-m/{id}', [AdminController::class, 'ManageLP'])->name('lpmanage');
    Route::put('/landing-pages/{id}', [AdminController::class, 'updateLP'])->name('landing-page.update');
    Route::post('/d-landing-page/{id}/duplicate', [AdminController::class, 'duplicateLP'])->name('lp-duplicate');
    Route::delete('/d-landing-page/{id}/delete', [AdminController::class, 'deleteLP'])->name('lp-delete');
    Route::post('/landing_page_toggle', [AdminController::class, 'toggle_landing_page'])->name('togglelanding');
    Route::get('/sections/manage/{id}', [AdminController::class, 'ManageSection'])->name('sectionsmanage');
    Route::get('/cards/manage/{id}', [AdminController::class, 'ManageCards'])->name('cardsmanage');
    Route::put('/sections/{id}', [AdminController::class, 'updateSection'])->name('section.update');
    Route::put('/cards/{id}', [AdminController::class, 'updateCard'])->name('card.update');
    Route::resource('/payments', PaymentController::class);
    Route::resource('/clients', ClientController::class);
    Route::get('/payments', [AdminController::class, 'getPayments'])->name('payments');
    Route::get('/contact', [AdminController::class, 'getContactNotifications'])->name('contacts');
    Route::get('/contact-manage/{id_notification}', [AdminController::class, 'manageContactNotification'])->name('contact_notification_manage');
    Route::post('/contact-replay', [AdminController::class, 'contactReplay'])->name('contact_notification_replay');
    Route::delete('/contact-delete', [AdminController::class, 'deleteNotification'])->name('notification-delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

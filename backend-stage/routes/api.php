<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\LandingPageController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\contactNotificationController;
use App\Http\Controllers\PaymentController;

Route::apiResource('landing-pages', LandingPageController::class);
Route::get('sections/lp/{id}', [SectionController::class, 'getSectionLp']);
Route::apiResource('sections', SectionController::class);
Route::get('cards/section/{id}', [CardController::class, 'getCardsSection']);
Route::apiResource('cards', CardController::class);
Route::post('clients', [ClientController::class, 'store']);
Route::post('payments', [PaymentController::class, 'store']);
Route::post('contact', [contactNotificationController::class, 'sendContactNotificationMail'])->name('sendContactMail');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

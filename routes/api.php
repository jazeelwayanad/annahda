<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('subscription/success', [CheckoutController::class, 'payment_success'])->name('subscription.success');
Route::post('subscription/webhook', [CheckoutController::class, 'webhook']);

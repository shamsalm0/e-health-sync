<?php

use App\Http\Controllers\Auth\ContactVerifyController;
use App\Http\Controllers\Auth\MailVerifyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'login' => true,
    'register' => false,
    'reset' => false,
]);

Route::get('/verify-contact', [ContactVerifyController::class, 'verifyContact'])->name('verify-contact');
Route::post('/verify-contact', [ContactVerifyController::class, 'verifyContactStore'])->name('verify-contact.store');

Route::get('/verify-email', [MailVerifyController::class, 'verifyEmail'])->name('verify-email');
Route::post('/verify-email', [MailVerifyController::class, 'verifyEmailStore'])->name('verify-email.store');

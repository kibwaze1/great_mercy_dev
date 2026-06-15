<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentCallbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Enquire (chat) page
Route::get('/enquire', function () {
    return view('enquire');
})->name('enquire');

// Chat API endpoint
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');

// Agent redirect (temporary)
Route::get('/office-contact', function () {
    return "Office contact page – coming soon!";
})->name('office.contact');

// Enrollment modal program routes
Route::get('/home-program', function () {
    return "Home Program Enrollment – coming soon!";
})->name('home.program');

Route::get('/school-program', function () {
    return "School Program Enrollment – coming soon!";
})->name('school.program');

/*
|--------------------------------------------------------------------------
| School Section (modular)
|--------------------------------------------------------------------------
*/
Route::prefix('school')->name('school.')->group(function () {
    // Static pages
    Route::get('/', fn() => view('school.home'))->name('home');
    Route::get('/academics', fn() => view('school.academics'))->name('academics');
    Route::get('/admission', fn() => view('school.admission'))->name('admission');
    Route::get('/about', fn() => view('school.about'))->name('about');
    Route::get('/contact', fn() => view('school.contact'))->name('contact');

    // Application flow
    Route::get('/apply', [ApplyController::class, 'showForm'])->name('apply');
    Route::post('/apply', [ApplyController::class, 'submitForm'])->name('apply.submit');

    // Payment flow (M‑Pesa)
    Route::get('/payment/{application}', [ApplyController::class, 'showPayment'])->name('payment');
    Route::post('/payment/{application}', [ApplyController::class, 'initiatePayment'])->name('payment.initiate');
    Route::get('/payment/status/{application}', [ApplyController::class, 'paymentStatus'])->name('payment.status');
    Route::get('/payment/check/{application}', [ApplyController::class, 'checkPaymentStatus'])->name('payment.check');
});

/*
|--------------------------------------------------------------------------
| M‑Pesa Callback (publicly accessible, excluded from CSRF)
|--------------------------------------------------------------------------
*/
Route::post('/mpesa/stk-push-callback', [PaymentCallbackController::class, 'stkPushCallback'])->name('mpesa.callback');

/*
|--------------------------------------------------------------------------
| Orphanage Section (placeholder)
|--------------------------------------------------------------------------
*/
Route::prefix('orphanage')->name('orphanage.')->group(function () {
    Route::get('/', fn() => 'Orphanage home – coming soon')->name('home');
    Route::get('/mission', fn() => 'Orphanage mission')->name('mission');
    Route::get('/sponsor', fn() => 'Sponsor a child')->name('sponsor');
    Route::get('/contact', fn() => 'Orphanage contact')->name('contact');
});

/*
|--------------------------------------------------------------------------
| Clinic Section (placeholder)
|--------------------------------------------------------------------------
*/
Route::prefix('clinic')->name('clinic.')->group(function () {
    Route::get('/', fn() => 'Clinic home – coming soon')->name('home');
    Route::get('/services', fn() => 'Clinic services')->name('services');
    Route::get('/appointment', fn() => 'Book appointment')->name('appointment');
});

/*
|--------------------------------------------------------------------------
| Chapel Section (placeholder)
|--------------------------------------------------------------------------
*/
Route::prefix('chapel')->name('chapel.')->group(function () {
    Route::get('/', fn() => 'Chapel home – coming soon')->name('home');
    Route::get('/services', fn() => 'Worship services')->name('services');
    Route::get('/prayer', fn() => 'Prayer request')->name('prayer');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard (with authentication)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
    Route::get('/application/{application}', [AdminController::class, 'show'])->name('application.show');
});

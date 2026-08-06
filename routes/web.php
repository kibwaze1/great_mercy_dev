<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\SchoolPageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentHighlightController;
use App\Http\Controllers\AlumniPublicController;
use App\Models\Alumni;
use App\Models\Staff;
use App\Models\StudentHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page (Main site) - Using HomeController to pass news data
Route::get('/', [HomeController::class, 'index'])->name('home');

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
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes (guest only)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');
    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest:admin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes (auth required)
    Route::middleware('admin.auth')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // News Management
        Route::resource('news', NewsController::class);

        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings/admission-fee', [SettingsController::class, 'updateAdmissionFee'])->name('settings.admission-fee');
        Route::post('/settings/bank', [SettingsController::class, 'updateBankDetails'])->name('settings.bank');
        Route::post('/settings/mpesa', [SettingsController::class, 'updateMpesaDetails'])->name('settings.mpesa');
        Route::post('/settings/contact', [SettingsController::class, 'updateContactDetails'])->name('settings.contact');
        Route::post('/settings/fee-pdf', [SettingsController::class, 'updateFeeStructure'])->name('settings.fee-pdf');
        Route::post('/settings/hero', [SettingsController::class, 'updateHero'])->name('settings.hero');

        // User Management
        Route::resource('users', UserController::class)->except(['show']);
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

        // Applications Management
        Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
        Route::get('/application/{application}', [AdminController::class, 'show'])->name('application.show');
        Route::post('/application/{application}/approve', [AdminController::class, 'approve'])->name('application.approve');
        Route::post('/application/{application}/reject', [AdminController::class, 'reject'])->name('application.reject');
        Route::post('/applications/bulk-approve', [AdminController::class, 'bulkApprove'])->name('applications.bulk-approve');

        // Messages Management
        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/message/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::post('/message/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
        Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
        Route::post('/messages/mark-all-read', [MessageController::class, 'markAllRead'])->name('messages.mark-all-read');

        // Admin Alumni Management
        Route::resource('alumni', AlumniController::class);

        // Staff Management
        Route::resource('staff', StaffController::class);

        // Student Highlights Management
        Route::resource('students', StudentHighlightController::class);
    });
});

/*
|--------------------------------------------------------------------------
| School Section (modular) - ALL SCHOOL ROUTES HERE
|--------------------------------------------------------------------------
*/
Route::prefix('school')->name('school.')->group(function () {
    // Static pages - using SchoolPageController
    Route::get('/', [SchoolPageController::class, 'home'])->name('home');
    Route::get('/academics', [SchoolPageController::class, 'academics'])->name('academics');
    Route::get('/admission', [SchoolPageController::class, 'admission'])->name('admission');
    Route::get('/about', [SchoolPageController::class, 'about'])->name('about');
    Route::get('/contact', [SchoolPageController::class, 'contact'])->name('contact');

    // Alumni, Staff, Students pages
    Route::get('/alumni', function () {
        $alumni = Alumni::where('is_active', true)
                    ->orderBy('graduation_year', 'desc')
                    ->get();
        return view('school.alumni', compact('alumni'));
    })->name('alumni');

    Route::get('/staff', function () {
        $staff = Staff::where('is_active', true)->get();
        return view('school.staff', compact('staff'));
    })->name('staff');

    Route::get('/students', function () {
        $highlights = StudentHighlight::where('is_active', true)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('school.students', compact('highlights'));
    })->name('students');

    // Contact form submission
    Route::post('/contact', function (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = \App\Models\Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $adminEmail = \App\Models\Setting::get('contact_receive_email', 'admin@greatmercy.org');

        try {
            Mail::raw("Name: {$request->name}\nEmail: {$request->email}\n\nMessage:\n{$request->message}", function ($message) use ($adminEmail, $request) {
                $message->to($adminEmail)
                        ->subject('New Contact Message: ' . $request->subject)
                        ->replyTo($request->email, $request->name);
            });

            return back()->with('success', 'Message sent successfully! We will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    })->name('contact.submit');

    // Application flow
    Route::get('/apply', [ApplyController::class, 'showForm'])->name('apply');
    Route::post('/apply', [ApplyController::class, 'submitForm'])->name('apply.submit');

    // Payment flow (M‑Pesa)
    Route::get('/payment/{application}', [ApplyController::class, 'showPayment'])->name('payment');
    Route::post('/payment/{application}', [ApplyController::class, 'initiatePayment'])->name('payment.initiate');
    Route::get('/payment/status/{application}', [ApplyController::class, 'paymentStatus'])->name('payment.status');
    Route::get('/payment/check/{application}', [ApplyController::class, 'checkPaymentStatus'])->name('payment.check');

    // Static PDF Download Route for Fee Structure
    Route::get('/download-fee-structure', function () {
        $filePath = \App\Models\Setting::get('fee_pdf_path');

        if ($filePath) {
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($filePath)) {
                return response()->download(storage_path('app/public/' . $filePath), 'Great_Mercy_Fee_Structure_2026.pdf');
            } elseif (file_exists(public_path($filePath))) {
                return response()->download(public_path($filePath), 'Great_Mercy_Fee_Structure_2026.pdf');
            }
        }

        if (file_exists(public_path('fee_structure.pdf'))) {
            return response()->download(public_path('fee_structure.pdf'), 'Great_Mercy_Fee_Structure_2026.pdf');
        }

        abort(404, 'Fee structure PDF not found. Please upload in the admin settings.');
    })->name('download.fee.structure');
});

/*
|--------------------------------------------------------------------------
| Alumni Section (Standalone)
|--------------------------------------------------------------------------
*/
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/', [AlumniPublicController::class, 'index'])->name('index');
    Route::get('/{alumni}', [AlumniPublicController::class, 'show'])->name('show');

    // Placeholder routes for nav links
    Route::get('/about', function () {
        return view('alumni.about');
    })->name('about');

    Route::get('/membership', function () {
        return view('alumni.membership');
    })->name('membership');

    Route::get('/donate', function () {
        return view('alumni.donate');
    })->name('donate');

    Route::get('/contact', function () {
        return view('alumni.contact');
    })->name('contact');
});

/*
|--------------------------------------------------------------------------
| M‑Pesa Callback (publicly accessible, excluded from CSRF)
|--------------------------------------------------------------------------
*/
Route::post('/mpesa/stk-push-callback', [PaymentCallbackController::class, 'stkPushCallback'])->name('mpesa.callback');

/*
|--------------------------------------------------------------------------
| Orphanage Section
|--------------------------------------------------------------------------
*/
Route::prefix('orphanage')->name('orphanage.')->group(function () {
    Route::get('/', fn() => view('orphanage.home'))->name('home');
    Route::get('/mission', fn() => view('orphanage.mission'))->name('mission');
    Route::get('/sponsor', fn() => view('orphanage.sponsor'))->name('sponsor');
    Route::get('/contact', fn() => view('orphanage.contact'))->name('contact');
});

/*
|--------------------------------------------------------------------------
| Clinic Section
|--------------------------------------------------------------------------
*/
Route::prefix('clinic')->name('clinic.')->group(function () {
    Route::get('/', fn() => view('clinic.home'))->name('home');
    Route::get('/services', fn() => view('clinic.services'))->name('services');
    Route::get('/appointment', fn() => view('clinic.appointment'))->name('appointment');
});

/*
|--------------------------------------------------------------------------
| Chapel Section
|--------------------------------------------------------------------------
*/
Route::prefix('chapel')->name('chapel.')->group(function () {
    Route::get('/', fn() => view('chapel.home'))->name('home');
    Route::get('/services', fn() => view('chapel.services'))->name('services');
    Route::get('/prayer', fn() => view('chapel.prayer'))->name('prayer');
});

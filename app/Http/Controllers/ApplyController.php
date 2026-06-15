<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;
use Felix\LaravelMpesa\Facades\Mpesa;

class ApplyController extends Controller
{
    /**
     * Show the application form
     */
    public function showForm()
    {
        return view('school.apply');
    }

    /**
     * Submit the application form, store files, then redirect to payment
     */
    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'dob'              => 'required|date',
            'gender'           => 'required|in:Male,Female',
            'grade'            => 'required|string',
            'address'          => 'nullable|string',
            'phone'            => 'required|string|max:20',
            'email'            => 'required|email|max:255',
            'parent_name'      => 'required|string|max:255',
            'message'          => 'nullable|string',
            'birth_certificate'=> 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'transfer_letter'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Store files
        $birthCertPath = $request->file('birth_certificate')->store('applications/birth_certificates', 'public');
        $transferPath = null;
        if ($request->hasFile('transfer_letter')) {
            $transferPath = $request->file('transfer_letter')->store('applications/transfer_letters', 'public');
        }

        $application = Application::create([
            'full_name'        => $validated['full_name'],
            'dob'              => $validated['dob'],
            'gender'           => $validated['gender'],
            'grade'            => $validated['grade'],
            'address'          => $validated['address'],
            'phone'            => $validated['phone'],
            'email'            => $validated['email'],
            'parent_name'      => $validated['parent_name'],
            'message'          => $validated['message'],
            'birth_certificate'=> $birthCertPath,
            'transfer_letter'  => $transferPath,
            'payment_status'   => 'pending',
        ]);

        // Send email notification to admin (optional)
        Mail::to(config('mail.admin_address'))->send(new ApplicationReceived($application));

        // Redirect to payment page where user enters phone number
        return redirect()->route('school.payment', ['application' => $application->id]);
    }

    /**
     * Show the payment form (ask for M-Pesa phone number)
     */
    public function showPayment(Application $application)
    {
        // If already paid, redirect to success page
        if ($application->payment_status === 'paid') {
            return redirect()->route('school.apply')->with('success', 'You have already paid. Your application is under review.');
        }
        return view('school.payment', compact('application'));
    }

    /**
     * Initiate STK Push to user's phone
     */
    public function initiatePayment(Request $request, Application $application)
    {
        $request->validate([
            'phone' => 'required|string|regex:/^254[0-9]{9}$/',
        ]);

        $phone = $this->formatPhoneNumber($request->phone);
        $amount = 600; // Admission fee

        try {
            $stkPush = Mpesa::stkPush()
                ->amount($amount)
                ->phone($phone)
                ->reference('APP-' . $application->id)
                ->description('Admission Fee for ' . $application->full_name)
                ->send();

            if ($stkPush->successful()) {
                // Save the CheckoutRequestID for later callback verification
                $application->update([
                    'checkout_request_id' => $stkPush->MerchantRequestID,
                    'payment_status'      => 'pending',
                ]);

                // Redirect to a waiting page or back to payment with info
                return redirect()->route('school.payment.status', $application)
                    ->with('info', 'STK Push sent to your phone. Please enter your M-Pesa PIN to complete payment.');
            } else {
                return back()->with('error', 'Failed to initiate payment: ' . $stkPush->errorMessage());
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Payment initiation error: ' . $e->getMessage());
        }
    }

    /**
     * Show payment status page (waiting for callback)
     */
    public function paymentStatus(Application $application)
    {
        return view('school.payment_status', compact('application'));
    }

    /**
     * Manually check payment status (optional, for debugging)
     */
    public function checkPaymentStatus(Application $application)
    {
        if (!$application->checkout_request_id) {
            return redirect()->route('school.payment', $application)
                ->with('error', 'No pending payment found. Please initiate payment again.');
        }

        try {
            $status = Mpesa::stkPush()->checkStatus($application->checkout_request_id);
            if ($status->successful()) {
                // The callback should have already updated the record.
                // This is just a fallback.
                $resultData = $status->data();
                if (isset($resultData['ResultCode']) && $resultData['ResultCode'] == 0) {
                    $application->update([
                        'mpesa_transaction_id' => $resultData['CallbackMetadata']['Item'][1]['Value'] ?? null,
                        'payment_status' => 'paid'
                    ]);
                    return redirect()->route('school.apply')->with('success', 'Payment confirmed! Your application is now complete.');
                } else {
                    return redirect()->route('school.payment', $application)
                        ->with('error', 'Payment not completed. Please try again.');
                }
            } else {
                return back()->with('error', 'Unable to verify payment status. Please contact support.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Status check error: ' . $e->getMessage());
        }
    }

    /**
     * Helper to format phone number to 254XXXXXXXXX
     */
    private function formatPhoneNumber($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        if (substr($phone, 0, 1) == '0') {
            $phone = '254' . substr($phone, 1);
        }
        if (substr($phone, 0, 4) == '+254') {
            $phone = substr($phone, 1);
        }
        return $phone;
    }
}

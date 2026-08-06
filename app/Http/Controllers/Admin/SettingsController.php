<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        $admissionFee = Setting::get('admission_fee', '600');

        // Bank Details
        $bankName = Setting::get('bank_name', 'Co-operative Bank');
        $bankAccountName = Setting::get('bank_account_name', 'Great Mercy Education Centre');
        $bankAccountNumber = Setting::get('bank_account_number', '01129599117900');

        // M-Pesa Details
        $mpesaPaybill = Setting::get('mpesa_paybill', '400200');
        $mpesaAccountNumber = Setting::get('mpesa_account_number', '1075638');
        $mpesaAccountName = Setting::get('mpesa_account_name', 'Great Mercy Education Centre');

        // Contact Details
        $contactPhone1 = Setting::get('contact_phone_1', '+254 727791668');
        $contactPhone2 = Setting::get('contact_phone_2', '+254 729488356');
        $contactEmail1 = Setting::get('contact_email_1', 'gmcmorg@yahoo.com');
        $contactEmail2 = Setting::get('contact_email_2', 'school@greatmercy.org');
        $contactAddress = Setting::get('contact_address', 'Kitale, Kenya');
        $contactPoBox = Setting::get('contact_po_box', 'P.O Box 1665-30200');
        $contactHours = Setting::get('contact_hours', 'Mon-Fri: 8:00am - 5:00pm, Sat: 9:00am - 1:00pm');
        $contactReceiveEmail = Setting::get('contact_receive_email', 'admin@greatmercy.org');

        // Get hero images from public folder
        $heroPaths = [];
        foreach (['home', 'school', 'orphanage', 'clinic', 'chapel'] as $section) {
            $path = Setting::get('hero_' . $section);
            $heroPaths[$section] = ($path && file_exists(public_path($path))) ? $path : null;
        }

        return view('admin.settings', compact(
            'admissionFee',
            'bankName',
            'bankAccountName',
            'bankAccountNumber',
            'mpesaPaybill',
            'mpesaAccountNumber',
            'mpesaAccountName',
            'heroPaths',
            'contactPhone1',
            'contactPhone2',
            'contactEmail1',
            'contactEmail2',
            'contactAddress',
            'contactPoBox',
            'contactHours',
            'contactReceiveEmail'
        ));
    }

    public function updateAdmissionFee(Request $request)
    {
        $request->validate([
            'admission_fee' => 'required|numeric|min:0',
        ]);

        Setting::set('admission_fee', $request->admission_fee);
        return back()->with('success', 'Admission fee updated successfully.');
    }

    public function updateBankDetails(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'bank_account_name' => 'required|string|max:255',
            'bank_account_number' => 'required|string|max:255',
        ]);

        Setting::set('bank_name', $request->bank_name);
        Setting::set('bank_account_name', $request->bank_account_name);
        Setting::set('bank_account_number', $request->bank_account_number);

        return back()->with('success', 'Bank details updated successfully.');
    }

    public function updateMpesaDetails(Request $request)
    {
        $request->validate([
            'mpesa_paybill' => 'required|string|max:255',
            'mpesa_account_number' => 'required|string|max:255',
            'mpesa_account_name' => 'required|string|max:255',
        ]);

        Setting::set('mpesa_paybill', $request->mpesa_paybill);
        Setting::set('mpesa_account_number', $request->mpesa_account_number);
        Setting::set('mpesa_account_name', $request->mpesa_account_name);

        return back()->with('success', 'M-Pesa details updated successfully.');
    }

    public function updateFeeStructure(Request $request)
    {
        $request->validate([
            'fee_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        // Delete old fee PDF from storage
        $oldFile = Setting::get('fee_pdf_path');
        if ($oldFile && Storage::disk('public')->exists($oldFile)) {
            Storage::disk('public')->delete($oldFile);
        }

        // Save new PDF to storage
        $path = $request->file('fee_pdf')->store('fee_pdfs', 'public');

        Setting::set('fee_pdf_path', $path);

        return back()->with('success', 'Fee structure uploaded successfully.');
    }

    public function updateHero(Request $request)
    {
        $request->validate([
            'hero_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'section' => 'required|in:home,school,orphanage,clinic,chapel',
        ]);

        // Ensure directory exists
        if (!file_exists(public_path('images'))) {
            mkdir(public_path('images'), 0755, true);
        }

        // Delete old hero image
        $oldHero = Setting::get('hero_' . $request->section);
        if ($oldHero && file_exists(public_path($oldHero))) {
            unlink(public_path($oldHero));
        }

        // Save new image directly to public/images/
        $extension = $request->file('hero_image')->getClientOriginalExtension();
        $fileName = 'hero_' . $request->section . '.' . $extension;
        $path = 'images/' . $fileName;
        $request->file('hero_image')->move(public_path('images'), $fileName);

        Setting::set('hero_' . $request->section, $path);

        return back()->with('success', 'Hero image updated successfully.');
    }

    public function updateContactDetails(Request $request)
    {
        $request->validate([
            'contact_phone_1' => 'required|string|max:255',
            'contact_phone_2' => 'nullable|string|max:255',
            'contact_email_1' => 'required|email|max:255',
            'contact_email_2' => 'nullable|email|max:255',
            'contact_address' => 'required|string|max:255',
            'contact_po_box' => 'required|string|max:255',
            'contact_hours' => 'required|string|max:255',
            'contact_receive_email' => 'required|email|max:255',
        ]);

        Setting::set('contact_phone_1', $request->contact_phone_1);
        Setting::set('contact_phone_2', $request->contact_phone_2 ?? '');
        Setting::set('contact_email_1', $request->contact_email_1);
        Setting::set('contact_email_2', $request->contact_email_2 ?? '');
        Setting::set('contact_address', $request->contact_address);
        Setting::set('contact_po_box', $request->contact_po_box);
        Setting::set('contact_hours', $request->contact_hours);
        Setting::set('contact_receive_email', $request->contact_receive_email);

        return back()->with('success', 'Contact details updated successfully.');
    }
}

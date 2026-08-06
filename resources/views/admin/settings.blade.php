@extends('admin.layout')

@section('title', 'Settings')
@section('nav-settings', 'active')

@section('content')
<div class="settings">

    <!-- Admission Fee -->
    <div class="settings-section">
        <h3>💰 Admission Fee</h3>
        <form method="POST" action="{{ route('admin.settings.admission-fee') }}">
            @csrf
            <div class="form-row">
                <label>Admission Fee (KES)</label>
                <input type="number" name="admission_fee" value="{{ $admissionFee }}" required min="0">
                <button type="submit" class="btn-primary">Update</button>
            </div>
            <p class="helper-text">This fee is shown on the admission page and payment page.</p>
        </form>
    </div>

    <hr>

    <!-- Bank Details -->
    <div class="settings-section">
        <h3>🏦 Bank Payment Details</h3>
        <form method="POST" action="{{ route('admin.settings.bank') }}">
            @csrf
            <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="bank_name" value="{{ $bankName }}" required>
            </div>
            <div class="form-group">
                <label>Account Name</label>
                <input type="text" name="bank_account_name" value="{{ $bankAccountName }}" required>
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="bank_account_number" value="{{ $bankAccountNumber }}" required>
            </div>
            <button type="submit" class="btn-primary">Update Bank Details</button>
        </form>
    </div>

    <hr>

    <!-- M-Pesa Details -->
    <div class="settings-section">
        <h3>📱 M-Pesa Payment Details</h3>
        <form method="POST" action="{{ route('admin.settings.mpesa') }}">
            @csrf
            <div class="form-group">
                <label>Paybill Number</label>
                <input type="text" name="mpesa_paybill" value="{{ $mpesaPaybill }}" required>
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="mpesa_account_number" value="{{ $mpesaAccountNumber }}" required>
            </div>
            <div class="form-group">
                <label>Account Name</label>
                <input type="text" name="mpesa_account_name" value="{{ $mpesaAccountName }}" required>
            </div>
            <button type="submit" class="btn-primary">Update M-Pesa Details</button>
        </form>
    </div>

    <hr>

    <!-- Contact Details -->
    <div class="settings-section">
        <h3>📞 Contact Details</h3>
        <form method="POST" action="{{ route('admin.settings.contact') }}">
            @csrf
            <div class="form-group">
                <label>Phone Number 1</label>
                <input type="text" name="contact_phone_1" value="{{ $contactPhone1 }}" required>
            </div>
            <div class="form-group">
                <label>Phone Number 2</label>
                <input type="text" name="contact_phone_2" value="{{ $contactPhone2 }}">
            </div>
            <div class="form-group">
                <label>Email Address 1</label>
                <input type="email" name="contact_email_1" value="{{ $contactEmail1 }}" required>
            </div>
            <div class="form-group">
                <label>Email Address 2</label>
                <input type="email" name="contact_email_2" value="{{ $contactEmail2 }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="contact_address" value="{{ $contactAddress }}" required>
            </div>
            <div class="form-group">
                <label>P.O Box</label>
                <input type="text" name="contact_po_box" value="{{ $contactPoBox }}" required>
            </div>
            <div class="form-group">
                <label>Office Hours</label>
                <input type="text" name="contact_hours" value="{{ $contactHours }}" required>
                <p class="helper-text">e.g., Mon-Fri: 8:00am - 5:00pm, Sat: 9:00am - 1:00pm</p>
            </div>
            <div class="form-group" style="border-top: 1px solid #eee; padding-top: 1rem; margin-top: 0.5rem;">
                <label style="color: #002D62; font-size: 1rem; font-weight: 700;">📧 Contact Form Settings</label>
                <p class="helper-text">Where should contact form messages be sent?</p>
            </div>
            <div class="form-group">
                <label>Receive Contact Messages At</label>
                <input type="email" name="contact_receive_email" value="{{ $contactReceiveEmail }}" required>
                <p class="helper-text">All contact form messages will be sent to this email address.</p>
            </div>
            <button type="submit" class="btn-primary">Update Contact Details</button>
        </form>
    </div>

    <hr>

    <!-- Fee Structure PDF -->
    <div class="settings-section">
        <h3>📄 Fee Structure (PDF)</h3>
        <form method="POST" action="{{ route('admin.settings.fee-pdf') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <input type="file" name="fee_pdf" accept=".pdf" required>
                <button type="submit" class="btn-primary">Upload PDF</button>
            </div>
            @php
                $feePdfPath = \App\Models\Setting::get('fee_pdf_path');
                $feePdfUrl = null;
                if ($feePdfPath) {
                    if (\Illuminate\Support\Facades\Storage::disk('public')->exists($feePdfPath)) {
                        $feePdfUrl = asset('storage/' . $feePdfPath);
                    } elseif (file_exists(public_path($feePdfPath))) {
                        $feePdfUrl = asset($feePdfPath);
                    }
                }
            @endphp
            @if($feePdfUrl)
                <p class="helper-text">
                    Current PDF: <a href="{{ $feePdfUrl }}" target="_blank">View Current PDF</a>
                </p>
            @else
                <p class="helper-text" style="color:#999;">No PDF uploaded yet.</p>
            @endif
        </form>
    </div>

    <hr>

    <!-- Hero Images -->
    <div class="settings-section">
        <h3>🖼️ Hero Images</h3>
        <p class="helper-text">Update hero images for each section. Recommended size: 1600 x 600px.</p>

        @foreach(['home', 'school', 'orphanage', 'clinic', 'chapel'] as $section)
        <div id="hero-{{ $section }}" class="hero-upload-row">
            <form method="POST" action="{{ route('admin.settings.hero') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="section" value="{{ $section }}">
                <div class="hero-row">
                    <div class="hero-label-section">
                        <span class="hero-section-label">{{ ucfirst($section) }}</span>
                        @php
                            $heroPath = $heroPaths[$section] ?? null;
                            $heroUrl = $heroPath && file_exists(public_path($heroPath)) ? asset($heroPath) : null;
                        @endphp
                        @if($heroUrl)
                            <a href="{{ $heroUrl }}" target="_blank" class="hero-view-link">View Current</a>
                        @else
                            <span class="hero-no-image">No image set</span>
                        @endif
                    </div>
                    <div class="hero-input-group">
                        <input type="file" name="hero_image" accept="image/*" required>
                        <button type="submit" class="btn-primary btn-small">Update</button>
                    </div>
                </div>
                @if($heroUrl)
                    <div class="hero-preview">
                        <img src="{{ $heroUrl }}" alt="{{ ucfirst($section) }} Hero">
                    </div>
                @endif
            </form>
        </div>
        @endforeach
    </div>

</div>

<style>
    .settings { max-width: 900px; margin: 0 auto; }
    .settings-section { margin-bottom: 1.5rem; }
    .settings-section h3 { color: #002D62; margin-bottom: 0.8rem; font-size: 1.1rem; }
    hr { margin: 1.5rem 0; border: none; border-top: 1px solid #eee; }
    .form-row { display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; }
    .form-row label { font-weight: 600; font-size: 0.85rem; color: #333; min-width: 140px; }
    .form-row input[type="number"], .form-row input[type="text"] { padding: 0.6rem 1rem; border: 1px solid #ddd; border-radius: 8px; flex: 1; min-width: 200px; font-family: 'Montserrat', sans-serif; }
    .form-row input[type="file"] { padding: 0.4rem; border: 1px solid #ddd; border-radius: 8px; flex: 1; font-family: 'Montserrat', sans-serif; background: white; }
    .form-group { margin-bottom: 0.8rem; }
    .form-group label { display: block; font-weight: 600; font-size: 0.85rem; color: #333; margin-bottom: 0.3rem; }
    .form-group input { width: 100%; max-width: 500px; padding: 0.6rem 1rem; border: 1px solid #ddd; border-radius: 8px; font-family: 'Montserrat', sans-serif; }
    .btn-primary { background: #002D62; color: white; padding: 0.5rem 1.2rem; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.2s; font-family: 'Montserrat', sans-serif; white-space: nowrap; }
    .btn-primary:hover { background: #003e7c; }
    .btn-small { padding: 0.3rem 0.8rem; font-size: 0.8rem; }
    .helper-text { font-size: 0.75rem; color: #666; margin-top: 0.3rem; }
    .hero-upload-row { background: #f8f9fc; border-radius: 8px; padding: 1rem; margin-bottom: 1rem; border: 1px solid #e0e7ed; }
    .hero-row { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
    .hero-label-section { display: flex; align-items: center; gap: 0.8rem; min-width: 150px; }
    .hero-section-label { font-weight: 700; font-size: 0.9rem; color: #002D62; text-transform: capitalize; min-width: 80px; }
    .hero-view-link { font-size: 0.7rem; color: #002D62; text-decoration: none; background: #eef2f7; padding: 0.15rem 0.6rem; border-radius: 4px; }
    .hero-view-link:hover { background: #dde2ea; }
    .hero-no-image { font-size: 0.7rem; color: #999; }
    .hero-input-group { display: flex; gap: 0.5rem; align-items: center; flex: 1; }
    .hero-input-group input[type="file"] { padding: 0.4rem; border: 1px solid #ddd; border-radius: 6px; flex: 1; font-family: 'Montserrat', sans-serif; background: white; }
    .hero-preview { margin-top: 0.8rem; max-width: 300px; border-radius: 6px; overflow: hidden; border: 1px solid #e0e7ed; }
    .hero-preview img { width: 100%; height: auto; display: block; }
    @media (max-width: 768px) {
        .hero-row { flex-direction: column; align-items: stretch; }
        .hero-label-section { justify-content: space-between; }
        .hero-input-group { flex-wrap: wrap; }
        .hero-input-group input[type="file"] { width: 100%; }
        .form-row { flex-direction: column; align-items: stretch; }
        .form-row label { min-width: auto; }
        .form-row input[type="number"], .form-row input[type="text"] { min-width: auto; width: 100%; }
        .form-group input { max-width: 100%; }
    }
</style>
@endsection

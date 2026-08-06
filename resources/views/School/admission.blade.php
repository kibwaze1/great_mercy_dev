@extends('school.layout')

@section('title', 'Admission - Great Mercy School')

@section('nav-admission', 'active')

@section('content')
<div class="admission-page">

    <!-- Admission Open - Clean White Section -->
    <section class="admission-open-section">
        <div class="container">
            <div class="admission-open-content">
                <h1>Admissions Open</h1>
                <p>Join Great Mercy School – where character meets opportunity</p>
                <a href="{{ route('school.apply') }}" class="admission-open-btn">Apply Now →</a>
            </div>
        </div>
    </section>

    <!-- How to Apply - Simple Steps -->
    <section class="process-section">
        <div class="container">
            <h2>How to Apply</h2>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-num">1</div>
                    <h3>Fill Application</h3>
                    <p>Complete the online application form</p>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <h3>Submit Documents</h3>
                    <p>Birth certificate, school report, passport photo</p>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <h3>Pay Fee</h3>
                    <p>KES {{ $admissionFee }} via M-Pesa or Bank</p>
                </div>
                <div class="step">
                    <div class="step-num">4</div>
                    <h3>Interview</h3>
                    <p>Schedule and attend the interview</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fee Structure Section -->
    <section class="fee-section">
        <div class="container">
            <div class="fee-card">
                <div class="fee-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h2>Fee Structure 2026</h2>
                <p>Download our detailed fee structure</p>
                <div class="fee-highlights">
                    <span>Day School: Ksh 12,000 - 33,000 per term</span>
                    <span>Boarding: Ksh 31,000 - 42,000 per term</span>
                    <span>Scholarships available</span>
                </div>

                @php
                    $feePdfPath = \App\Models\Setting::get('fee_pdf_path');
                    $feePdfExists = false;
                    if ($feePdfPath) {
                        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($feePdfPath) ||
                            file_exists(public_path($feePdfPath))) {
                            $feePdfExists = true;
                        }
                    }
                @endphp

                @if($feePdfExists)
                    <a href="{{ route('school.download.fee.structure') }}" class="download-btn">
                        <i class="fas fa-download"></i> Download Fee Structure (PDF)
                    </a>
                @else
                    <p class="fee-note" style="color: #999;">Fee structure PDF not yet uploaded. Please check back later.</p>
                @endif

                <p class="fee-note">* Additional fees for uniforms, books, and meals apply</p>
            </div>
        </div>
    </section>

    <!-- Fee Payment Section -->
    <section class="payment-section">
        <div class="container">
            <h2>Fee Payment</h2>
            <p class="payment-subtitle">Pay school fees conveniently through the following channels:</p>

            <div class="payment-grid">
                <!-- Bank Payment -->
                <div class="payment-card bank-card">
                    <div class="payment-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3>Bank Payment</h3>
                    <p class="bank-name">{{ \App\Models\Setting::get('bank_name', 'Co-operative Bank') }}</p>
                    <div class="payment-details">
                        <div class="detail-row">
                            <span class="detail-label">Account Name:</span>
                            <span class="detail-value">{{ \App\Models\Setting::get('bank_account_name', 'Great Mercy Education Centre') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Account Number:</span>
                            <span class="detail-value">{{ \App\Models\Setting::get('bank_account_number', '01129599117900') }}</span>
                        </div>
                    </div>
                </div>

                <!-- M-PESA Payment -->
                <div class="payment-card mpesa-card">
                    <div class="payment-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>M-PESA Payment</h3>
                    <div class="payment-details">
                        <div class="detail-row">
                            <span class="detail-label">Paybill Number:</span>
                            <span class="detail-value paybill-number">{{ \App\Models\Setting::get('mpesa_paybill', '400200') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Account Number:</span>
                            <span class="detail-value">{{ \App\Models\Setting::get('mpesa_account_number', '1075638') }}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Account Name:</span>
                            <span class="detail-value">{{ \App\Models\Setting::get('mpesa_account_name', 'Great Mercy Education Centre') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="payment-note">
                <p><i class="fas fa-info-circle"></i> For any payment inquiries, contact the school accounts office.</p>
            </div>
        </div>
    </section>

</div>

<style>
    .admission-page { background: #ffffff; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 5%; }

    .admission-open-section { padding: 3rem 0 1rem 0; text-align: center; background: #ffffff; }
    .admission-open-content h1 { font-size: 2.8rem; font-weight: 800; color: #002D62; margin-bottom: 0.5rem; }
    .admission-open-content p { font-size: 1.1rem; color: #555; margin-bottom: 1.5rem; }
    .admission-open-btn { background: #F5DD00; color: #001B3A; padding: 0.7rem 2rem; border-radius: 40px; font-weight: 700; font-size: 1rem; text-decoration: none; display: inline-block; transition: 0.2s; }
    .admission-open-btn:hover { transform: translateY(-2px); background: #ffe53a; }

    .process-section { padding: 4rem 0; background: #f8f9fc; }
    .process-section h2 { text-align: center; font-size: 1.8rem; color: #002D62; margin-bottom: 2.5rem; }
    .steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; }
    .step { text-align: center; padding: 1rem; }
    .step-num { width: 45px; height: 45px; background: #002D62; color: white; font-size: 1.3rem; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 0.8rem; }
    .step h3 { font-size: 1rem; color: #002D62; margin-bottom: 0.3rem; }
    .step p { font-size: 0.8rem; color: #666; }

    .fee-section { padding: 4rem 0; background: #f8f9fc; }
    .fee-card { background: white; border-radius: 16px; padding: 2rem; text-align: center; max-width: 650px; margin: 0 auto; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .fee-icon i { font-size: 2.5rem; color: #002D62; margin-bottom: 0.5rem; }
    .fee-card h2 { color: #002D62; font-size: 1.5rem; margin-bottom: 0.3rem; }
    .fee-card p { color: #555; margin-bottom: 1rem; }
    .fee-highlights { display: flex; flex-direction: column; gap: 0.3rem; margin: 1rem 0; text-align: left; padding: 0 1rem; }
    .fee-highlights span { font-size: 0.85rem; color: #333; }
    .download-btn { background: #002D62; color: white; padding: 0.6rem 1.5rem; border-radius: 40px; text-decoration: none; display: inline-block; font-weight: 600; font-size: 0.85rem; transition: 0.2s; }
    .download-btn:hover { background: #003e7c; transform: translateY(-2px); }
    .fee-note { font-size: 0.7rem; color: #999; margin-top: 0.5rem; }

    .payment-section { padding: 4rem 0; background: #ffffff; }
    .payment-section h2 { text-align: center; font-size: 1.8rem; color: #002D62; margin-bottom: 0.5rem; }
    .payment-subtitle { text-align: center; color: #666; margin-bottom: 2.5rem; font-size: 0.95rem; }
    .payment-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 900px; margin: 0 auto; }
    .payment-card { background: #f8f9fc; border-radius: 16px; padding: 2rem; text-align: center; border: 1px solid #e0e7ed; transition: 0.3s; }
    .payment-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.08); }
    .payment-icon i { font-size: 2.5rem; color: #002D62; margin-bottom: 0.5rem; }
    .payment-card h3 { font-size: 1.2rem; color: #002D62; margin-bottom: 0.5rem; }
    .bank-name { font-weight: 600; color: #002D62; margin-bottom: 1rem; }
    .payment-details { text-align: left; }
    .detail-row { display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #e0e7ed; font-size: 0.85rem; gap: 1rem; }
    .detail-row:last-child { border-bottom: none; }
    .detail-label { color: #666; font-weight: 500; flex-shrink: 0; }
    .detail-value { color: #1a1a2e; font-weight: 600; text-align: right; }
    /* Paybill number in BLACK */
    .detail-value.paybill-number {
        color: #000000;
        font-weight: 700;
    }
    .payment-note { text-align: center; margin-top: 2rem; padding: 1rem; background: #f8f9fc; border-radius: 8px; max-width: 700px; margin-left: auto; margin-right: auto; }
    .payment-note p { font-size: 0.8rem; color: #666; }
    .payment-note i { color: #002D62; margin-right: 0.5rem; }

    @media (max-width: 768px) {
        .admission-open-content h1 { font-size: 2rem; }
        .steps-grid { grid-template-columns: 1fr 1fr; }
        .payment-grid { grid-template-columns: 1fr; }
        .detail-row { flex-direction: column; align-items: center; text-align: center; gap: 0.2rem; }
        .detail-value { text-align: center; }
    }
    @media (max-width: 500px) { .steps-grid { grid-template-columns: 1fr; } }
</style>
@endsection

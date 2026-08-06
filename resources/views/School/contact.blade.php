@extends('school.layout')

@section('title', 'Contact Us - Great Mercy School')

@section('nav-contact', 'active')

@section('content')
<div class="contact-page">

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Contact Us</h1>
            <p>Get in touch with us for inquiries, admissions, or any questions.</p>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Phone -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Phone</h3>
                    <p><a href="tel:{{ str_replace(' ', '', \App\Models\Setting::get('contact_phone_1', '+254727791668')) }}">
                        {{ \App\Models\Setting::get('contact_phone_1', '+254 727791668') }}
                    </a></p>
                    @if(\App\Models\Setting::get('contact_phone_2'))
                        <p><a href="tel:{{ str_replace(' ', '', \App\Models\Setting::get('contact_phone_2')) }}">
                            {{ \App\Models\Setting::get('contact_phone_2') }}
                        </a></p>
                    @endif
                </div>

                <!-- Email -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p><a href="mailto:{{ \App\Models\Setting::get('contact_email_1', 'gmcmorg@yahoo.com') }}">
                        {{ \App\Models\Setting::get('contact_email_1', 'gmcmorg@yahoo.com') }}
                    </a></p>
                    @if(\App\Models\Setting::get('contact_email_2'))
                        <p><a href="mailto:{{ \App\Models\Setting::get('contact_email_2') }}">
                            {{ \App\Models\Setting::get('contact_email_2') }}
                        </a></p>
                    @endif
                </div>

                <!-- Address -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Address</h3>
                    <p>{{ \App\Models\Setting::get('contact_address', 'Kitale, Kenya') }}</p>
                    <p>{{ \App\Models\Setting::get('contact_po_box', 'P.O Box 1665-30200') }}</p>
                </div>

                <!-- Hours -->
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Office Hours</h3>
                    @php
                        $hours = \App\Models\Setting::get('contact_hours', 'Mon-Fri: 8:00am - 5:00pm, Sat: 9:00am - 1:00pm');
                        $hoursArray = explode(',', $hours);
                    @endphp
                    @foreach($hoursArray as $hour)
                        <p>{{ trim($hour) }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Form -->
    <section class="contact-form-section">
        <div class="container">
            <div class="form-wrapper">
                <h2>Send a Message</h2>

                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert-error">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('school.contact.submit') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Your Email</label>
                            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Enter subject" value="{{ old('subject') }}" required>
                        @error('subject') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" rows="4" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                        @error('message') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn-submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>

</div>

<style>
    .contact-page {
        background: #ffffff;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5%;
    }

    /* Hero */
    .contact-hero {
        padding: 3rem 2rem 1rem;
        text-align: center;
        background: #ffffff;
    }

    .contact-hero-content h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .contact-hero-content p {
        font-size: 1.1rem;
        color: #555;
        opacity: 0.8;
    }

    /* Alert Messages */
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 0.8rem 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .alert-error {
        background: #f8d7da;
        color: #721c24;
        padding: 0.8rem 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .error {
        color: #d32f2f;
        font-size: 0.75rem;
        display: block;
        margin-top: 0.2rem;
    }

    /* Contact Info Cards */
    .contact-info-section {
        padding: 3rem 0 2rem;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }

    .contact-card {
        text-align: center;
        padding: 1.5rem;
        background: #f8f9fc;
        border-radius: 12px;
        border: 1px solid #e0e7ed;
    }

    .contact-icon i {
        font-size: 2rem;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .contact-card h3 {
        font-size: 1rem;
        color: #002D62;
        margin-bottom: 0.5rem;
    }

    .contact-card p {
        font-size: 0.85rem;
        color: #555;
        margin: 0.2rem 0;
    }

    .contact-card a {
        color: #555;
        text-decoration: none;
    }

    .contact-card a:hover {
        color: #002D62;
    }

    /* Contact Form */
    .contact-form-section {
        padding: 2rem 0 4rem;
    }

    .form-wrapper {
        max-width: 700px;
        margin: 0 auto;
        background: #f8f9fc;
        padding: 2rem;
        border-radius: 12px;
        border: 1px solid #e0e7ed;
    }

    .form-wrapper h2 {
        font-size: 1.5rem;
        color: #002D62;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        color: #333;
        margin-bottom: 0.3rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.9rem;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #002D62;
    }

    .btn-submit {
        background: #002D62;
        color: white;
        padding: 0.7rem 2rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: 0.2s;
        width: 100%;
    }

    .btn-submit:hover {
        background: #003e7c;
    }

    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr 1fr;
        }
        .form-row {
            grid-template-columns: 1fr;
        }
        .form-wrapper {
            padding: 1.5rem;
        }
        .contact-hero-content h1 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 500px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

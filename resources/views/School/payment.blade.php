@extends('school.layout')

@section('title', 'Pay Admission Fee')

@section('content')
<div class="page">
    <h2>Pay KES 600 Admission Fee</h2>
    <p>Dear <strong>{{ $application->full_name }}</strong>, your application has been received.</p>
    <p>Please pay <strong>KES 600</strong> using M-Pesa Paybill <strong>123456</strong>, Account Number <strong>{{ $application->phone }}</strong>.</p>
    <p>After completing the payment, enter the M-Pesa transaction code below.</p>

    <form method="POST" action="{{ route('school.payment.process', $application) }}" class="payment-form">
        @csrf
        <div class="form-group">
            <label for="mpesa_transaction_id">M-Pesa Transaction Code *</label>
            <input type="text" name="mpesa_transaction_id" id="mpesa_transaction_id" placeholder="e.g., QWERTY123" required>
        </div>
        <button type="submit" class="btn">Confirm Payment</button>
    </form>
</div>

<style>
    .payment-form {
        max-width: 500px;
        margin: 2rem 0;
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.4rem;
        color: #002D62;
    }
    input {
        width: 100%;
        padding: 0.6rem 0.8rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
    }
    .btn {
        background: #F5DD00;
        color: #001B3A;
        padding: 0.5rem 1.2rem;
        border-radius: 30px;
        border: none;
        font-weight: 600;
        cursor: pointer;
    }
</style>
@endsection

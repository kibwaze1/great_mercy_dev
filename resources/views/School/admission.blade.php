@extends('school.layout')

@section('title', 'Admission & Fees')

@section('nav-admission', 'active')

@section('content')
<div class="page">
    <h2>Admission & Fees</h2>
    <p>Admission is open throughout the year. Contact the admissions office for fee structure and application forms.</p>
    <p><strong>Fee ranges:</strong> Ksh 15,000 – 45,000 per term (depending on grade & boarding/day).</p>
    <p>Scholarships available for needy and high-achieving students.</p>
    <button class="btn" onclick="alert('Contact admissions: +254727791668')">Request Fee Structure</button>
</div>
@endsection

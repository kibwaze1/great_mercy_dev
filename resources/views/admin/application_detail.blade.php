<!DOCTYPE html>
<html>
<head>
    <title>Application #{{ $application->id }}</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f6f9; }
        .card { background: white; padding: 20px; border-radius: 8px; max-width: 800px; margin: auto; }
        h2 { color: #002D62; }
        .label { font-weight: bold; width: 200px; display: inline-block; }
        .files a { display: block; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Application Details</h2>
        <p><span class="label">Full Name:</span> {{ $application->full_name }}</p>
        <p><span class="label">Date of Birth:</span> {{ $application->dob }}</p>
        <p><span class="label">Gender:</span> {{ $application->gender }}</p>
        <p><span class="label">Grade Applied:</span> {{ $application->grade }}</p>
        <p><span class="label">Address:</span> {{ $application->address ?? 'N/A' }}</p>
        <p><span class="label">Phone:</span> {{ $application->phone }}</p>
        <p><span class="label">Email:</span> {{ $application->email }}</p>
        <p><span class="label">Parent/Guardian:</span> {{ $application->parent_name }}</p>
        <p><span class="label">Additional Message:</span> {{ $application->message ?? 'N/A' }}</p>
        <p><span class="label">Birth Certificate:</span>
            <a href="{{ asset('storage/' . $application->birth_certificate) }}" target="_blank">View File</a>
        </p>
        @if($application->transfer_letter)
        <p><span class="label">Transfer Letter:</span>
            <a href="{{ asset('storage/' . $application->transfer_letter) }}" target="_blank">View File</a>
        </p>
        @endif
        <p><span class="label">Submitted:</span> {{ $application->created_at }}</p>
        <a href="{{ route('admin.applications') }}" class="btn">← Back to List</a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head><title>New Application</title></head>
<body>
    <h2>New Application from {{ $application->full_name }}</h2>
    <p><strong>Parent/Guardian:</strong> {{ $application->parent_name }}</p>
    <p><strong>Phone:</strong> {{ $application->phone }}</p>
    <p><strong>Email:</strong> {{ $application->email }}</p>
    <p><strong>Grade Applied:</strong> {{ $application->grade }}</p>
    <p><strong>Additional Message:</strong> {{ $application->message ?? 'N/A' }}</p>
    <hr>
    <p>View all applications in the admin dashboard.</p>
</body>
</html>

<!DOCTYPE html>
<html>
<head><title>New Application</title></head>
<body>
    <h2>New Application from <?php echo e($application->full_name); ?></h2>
    <p><strong>Parent/Guardian:</strong> <?php echo e($application->parent_name); ?></p>
    <p><strong>Phone:</strong> <?php echo e($application->phone); ?></p>
    <p><strong>Email:</strong> <?php echo e($application->email); ?></p>
    <p><strong>Grade Applied:</strong> <?php echo e($application->grade); ?></p>
    <p><strong>Additional Message:</strong> <?php echo e($application->message ?? 'N/A'); ?></p>
    <hr>
    <p>View all applications in the admin dashboard.</p>
</body>
</html>
<?php /**PATH C:\Users\PC\great-mercy\resources\views/emails/application_received.blade.php ENDPATH**/ ?>
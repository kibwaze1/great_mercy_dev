<?php $__env->startSection('title', 'Payment Instructions'); ?>
<?php $__env->startSection('content'); ?>
<div class="page">
    <h2>Payment Instructions</h2>
    <p>Please pay KES 600 using the details below:</p>
    <ul>
        <li><strong>M-Pesa Paybill:</strong> 123456</li>
        <li><strong>Account Number:</strong> Your Phone Number</li>
        <li><strong>Bank:</strong> Equity Bank, Account: 1234567890, Great Mercy School</li>
    </ul>
    <p>After payment, contact the school office to confirm your admission.</p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('school.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\great-mercy\resources\views/school/payment_instructions.blade.php ENDPATH**/ ?>
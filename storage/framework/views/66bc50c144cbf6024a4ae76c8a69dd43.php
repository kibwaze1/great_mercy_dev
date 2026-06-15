<?php $__env->startSection('title', 'Pay Admission Fee'); ?>

<?php $__env->startSection('content'); ?>
<div class="page">
    <h2>Pay KES 600 Admission Fee</h2>
    <p>Dear <strong><?php echo e($application->full_name); ?></strong>, your application has been received.</p>
    <p>Please pay <strong>KES 600</strong> using M-Pesa Paybill <strong>123456</strong>, Account Number <strong><?php echo e($application->phone); ?></strong>.</p>
    <p>After completing the payment, enter the M-Pesa transaction code below.</p>

    <form method="POST" action="<?php echo e(route('school.payment.process', $application)); ?>" class="payment-form">
        <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('school.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\great-mercy\resources\views/school/payment.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Pay Admission Fee'); ?>

<?php $__env->startSection('content'); ?>
<div class="page">
    <h2>Pay KES 600 Admission Fee</h2>
    <p>Dear <strong><?php echo e($application->full_name); ?></strong>, your application has been received.</p>
    <p>Please enter your M‑Pesa phone number below. You will receive an STK Push prompt on your phone to complete the payment of <strong>KES 600</strong>.</p>

    <?php if(session('error')): ?>
        <div class="alert-error">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('info')): ?>
        <div class="alert-info">
            <?php echo e(session('info')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('school.payment.initiate', $application)); ?>" class="payment-form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="phone">M-Pesa Phone Number (e.g., 254712345678) *</label>
            <input type="tel" name="phone" id="phone" placeholder="254712345678" value="<?php echo e(old('phone')); ?>" required>
            <small class="help-text">Use test number <strong>254708374149</strong> for Sandbox testing.</small>
        </div>
        <button type="submit" class="btn">Send STK Push</button>
    </form>
</div>

<style>
    .alert-error {
        background: #f8d7da;
        color: #721c24;
        padding: 0.8rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
    .alert-info {
        background: #d1ecf1;
        color: #0c5460;
        padding: 0.8rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
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
    .help-text {
        display: block;
        margin-top: 0.3rem;
        font-size: 0.75rem;
        color: #666;
    }
    .btn {
        background: #F5DD00;
        color: #001B3A;
        padding: 0.5rem 1.2rem;
        border-radius: 30px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn:hover {
        background: #ffe53a;
        transform: translateY(-2px);
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('school.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\great-mercy\resources\views/school/payment.blade.php ENDPATH**/ ?>
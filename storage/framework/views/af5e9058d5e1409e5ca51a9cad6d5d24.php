<?php $__env->startSection('title', 'Apply Now'); ?>

<?php $__env->startSection('content'); ?>
<div class="page">
    <h2>Application Form</h2>
    <p>Please fill in the details below. We will get back to you within 3 working days.</p>

    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('school.apply.submit')); ?>" enctype="multipart/form-data" class="application-form">
        <?php echo csrf_field(); ?>

        <!-- previous fields (full_name, dob, gender, grade, address, phone, email, parent_name, message) – same as before -->
        <div class="form-group">
            <label for="full_name">Full Name *</label>
            <input type="text" name="full_name" id="full_name" value="<?php echo e(old('full_name')); ?>" required>
            <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth *</label>
            <input type="date" name="dob" id="dob" value="<?php echo e(old('dob')); ?>" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="gender">Gender *</label>
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="grade">Applying for Grade/Class *</label>
                <select name="grade" required>
                    <option value="">Select</option>
                    <option value="Playgroup">Playgroup</option>
                    <option value="PP1">PP1</option>
                    <option value="PP2">PP2</option>
                    <option value="Grade 1">Grade 1</option>
                    <option value="Grade 2">Grade 2</option>
                    <option value="Grade 3">Grade 3</option>
                    <option value="Grade 4">Grade 4</option>
                    <option value="Grade 5">Grade 5</option>
                    <option value="Grade 6">Grade 6</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="address">Home Address</label>
            <input type="text" name="address" value="<?php echo e(old('address')); ?>">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="parent_name">Parent/Guardian Name *</label>
            <input type="text" name="parent_name" value="<?php echo e(old('parent_name')); ?>" required>
        </div>

        <!-- NEW FILE UPLOADS -->
        <div class="form-group">
            <label for="birth_certificate">Upload Birth Certificate (PDF, JPG, PNG) *</label>
            <input type="file" name="birth_certificate" id="birth_certificate" accept=".pdf,.jpg,.jpeg,.png" required>
            <?php $__errorArgs = ['birth_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="transfer_letter">Transfer Letter / Previous School Report (optional)</label>
            <input type="file" name="transfer_letter" id="transfer_letter" accept=".pdf,.jpg,.jpeg,.png">
            <?php $__errorArgs = ['transfer_letter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label for="message">Additional Information (optional)</label>
            <textarea name="message" rows="4"><?php echo e(old('message')); ?></textarea>
        </div>

        <button type="submit" class="btn">Submit Application</button>
    </form>
</div>

<style>
    /* same CSS as before, plus .alert-success */
    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }
    .application-form {
        max-width: 800px;
        margin: 2rem 0;
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    .form-row {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    .form-row .form-group {
        flex: 1;
        min-width: 180px;
    }
    label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.4rem;
        font-size: 0.85rem;
        color: #002D62;
    }
    input, select, textarea {
        width: 100%;
        padding: 0.6rem 0.8rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.9rem;
    }
    input[type="file"] {
        padding: 0.4rem;
    }
    .error {
        color: #d32f2f;
        font-size: 0.75rem;
        margin-top: 0.3rem;
        display: block;
    }
    @media (max-width: 600px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }
    }
</style>

<!-- JavaScript for payment popup (triggered after success message) -->
<?php if(session('show_payment_modal')): ?>
<script>
    window.onload = function() {
        if (confirm("Application submitted successfully!\n\nPlease pay the admission fee of KES 600.\nClick OK to proceed to payment (M-Pesa/ Bank).")) {
            // Redirect to payment page or show instructions
            window.location.href = "<?php echo e(route('school.payment.instructions')); ?>";
        } else {
            alert("You can complete payment later at the school office.");
        }
    }
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('school.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\great-mercy\resources\views/school/apply.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Great Mercy Development Centre">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Great Mercy Development Centre'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-left"></div>
        <div class="topbar-center">GREAT MERCY DEVELOPMENT CENTRE</div>
        <div class="topbar-right"></div>
    </div>

    <!-- Navbar (logo removed) -->
    <nav>
        <div class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <ul id="navMenu">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('school.home')); ?>">School</a></li>
            <li><a href="<?php echo e(route('orphanage.home')); ?>">Orphanage</a></li>
            <li><a href="<?php echo e(route('clinic.home')); ?>">Clinic</a></li>
            <li><a href="<?php echo e(route('chapel.home')); ?>">Chapel</a></li>
            <li><a href="<?php echo e(route('enquire')); ?>">Enquire</a></li>
        </ul>
        <div class="nav-right">
            <a href="mailto:gmcmorg@gmail.com"><i class="fas fa-envelope"></i></a>
            <a href="tel:+254727791668"><i class="fas fa-phone-alt"></i></a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div><h3>About Us</h3><p>Great Mercy Development Centre – raising morally upright children through love, quality education, and spiritual nourishment.</p></div>
            <div><h3>Programs</h3><p>School | Orphanage | Clinic | Chapel<br>Scholarships & Outreach.</p></div>
            <div><h3>Quick Links</h3><p>Admissions<br>Sponsor a Child<br>Volunteer</p></div>
            <div><h3>Contact Us</h3><p>📍 Kitale, Kenya<br>📞 <a href="tel:+254727791668">+254 727791668</a><br>✉️ <a href="mailto:gmcmorg@gmail.com">gmcmorg@gmail.com</a></p></div>
        </div>
        <div class="copy">© 2026 Great Mercy Development Centre. All Rights Reserved. | Transforming lives with love</div>
    </footer>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\PC\great-mercy\resources\views/layouts/app.blade.php ENDPATH**/ ?>
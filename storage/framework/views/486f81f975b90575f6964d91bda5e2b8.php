<?php $__env->startSection('title', 'Home - Great Mercy School'); ?>

<?php $__env->startSection('nav-home', 'active'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="school-hero" style="background-image: url('<?php echo e($heroUrl ?? asset('images/hero_school.jpg')); ?>');">
        <div class="school-hero-overlay"></div>
        <div class="school-hero-content">
            <h1>Welcome to Great Mercy School</h1>
            <p>We provide holistic, Christ-centered education that nurtures academic excellence, character, and leadership.</p>
            <a href="<?php echo e(route('school.apply')); ?>" class="hero-btn">Apply Now</a>
        </div>
    </section>

    <div class="stats-row">
        <div class="stat-item"><h3>500+</h3><p>Students</p></div>
        <div class="stat-item"><h3>40+</h3><p>Teachers</p></div>
        <div class="stat-item"><h3>30+</h3><p>Classrooms</p></div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    .school-hero {
        position: relative;
        width: 100vw;
        height: 80vh;
        min-height: 450px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .school-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .school-hero-content {
        position: relative;
        z-index: 1;
        max-width: 750px;
        padding: 2rem;
        color: white;
    }

    .school-hero-content h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .school-hero-content p {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .hero-btn {
        display: inline-block;
        background: #F5DD00;
        color: #001B3A;
        padding: 0.7rem 2rem;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.2s;
    }

    .hero-btn:hover {
        transform: translateY(-2px);
        background: #ffe53a;
    }

    .stats-row {
        display: flex;
        gap: 1.2rem;
        margin: 2rem 5%;
        flex-wrap: wrap;
    }

    .stat-item {
        background: #eef2f7;
        padding: 1rem;
        border-radius: 12px;
        text-align: center;
        flex: 1;
        min-width: 100px;
    }

    .stat-item h3 {
        font-size: 1.4rem;
        color: #002D62;
    }

    @media (max-width: 768px) {
        .school-hero {
            height: 60vh;
            min-height: 350px;
        }
        .school-hero-content h1 {
            font-size: 2rem;
        }
        .school-hero-content p {
            font-size: 0.95rem;
        }
    }
</style>

<?php echo $__env->make('school.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\great-mercy\resources\views/school/home.blade.php ENDPATH**/ ?>
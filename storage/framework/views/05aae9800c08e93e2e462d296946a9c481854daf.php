<?php $__env->startSection('title', 'Verify email address'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row align-items-center justify-content-center vh-100">
        <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 py-6">

            <?php if(session('status')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    A verification link has been sent to the email address, please click on the link to verify your
                    email address.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('message')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Verify your email
            </h1>
            <p class="text-secondary text-center">
                We've sent a link to your email address <br />
                Please follow the link inside to continue
            </p>
            <form method="POST" action="<?php echo e(route('verification.send')); ?>" class="mt-4 login-form">
                <?php echo csrf_field(); ?>
                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <!-- Link -->
                        <small class="mb-0 text-muted">Didn't receive an email?
                            <button class="fw-semibold btn btn-link" type="submit">
                                <?php echo e(__('Resend Verification Email')); ?></button>
                        </small>
                    </div>
                </div> <!-- / .row -->
            </form>
            <div class="mt-4 text-center">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-primary btn-block">
                        <?php echo e(__('Log Out')); ?>

                    </button>
                </form>
            </div>

        </div>
    </div> <!-- / .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/auth/verify-email.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Login manager account'); ?>
<?php $__env->startSection('content'); ?>

    <div class="row signpages text-center">
            <div class="col-md-12">
                
                 <div class="row row-sm">
                        <div class="col-lg-8 col-xl-8 col-xs-8 col-sm-12 login_form rounded-start-11">

                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <div class="text-center">
                                            <a href="/">
                                                <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" style="height: 60px" class="text-center" />
                                            </a>
                                        </div>
                                     

                                            

                <div class="card border-0">
            <?php if(session('message')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('message')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            </div>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Sign In
            </h1>

            <!-- Subtitle -->
            <p class="text-secondary text-center">
                Enter your email address and password to access your account.
            </p>

            <!-- Form -->
            <form method="POST" action="<?php echo e(route('adminlogin')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                         <div class="form-group text-start">
                            <!-- Label -->
                            <label class="form-label">
                                Email Address
                            </label>
                            <!-- Input -->
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                                placeholder="Your email address">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Password -->
                        <div class="mb-4">

                            <div class="row">
                                <div class="col">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>
                                </div>

                                <div class="col-auto">

                                    <!-- Help text -->
                                    <a href="<?php echo e(route('admin.forgetpassword')); ?>"
                                        class="form-text small text-muted link-primary">Forgot password</a>
                                </div>
                            </div> <!-- / .row -->

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password" name="password">

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->
                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <!-- Button -->
                        <button type="submit" class="btn w-100 btn-primary mt-6 mb-2">Sign in</button>
                    </div>
                </div> <!-- / .row -->
            </form>
        </div>
         </div>
    </div> <!-- / .row -->
     </div>
         </div>
    </div> <!-- / .row -->
      </div> <!-- / .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/auth/adminlogin.blade.php ENDPATH**/ ?>
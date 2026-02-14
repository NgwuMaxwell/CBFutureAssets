<?php $__env->startSection('title', 'Login account'); ?>
<?php $__env->startSection('content'); ?>



        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">




                    <?php if(Session::has('status')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?php echo e(session('status')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


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
                                        <h2 class="text-start mb-2">Sign In</h2>
                                        <p class="mb-4 text-muted tx-13 ms-0 text-start">Sign in to start trading
                                            crypto, forex and stocks.</p>
                                        <div class="panel desc-tabs border-0 p-0">


                                            



                                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                                <?php echo csrf_field(); ?>
                                                 <div class="panel-body tabs-menu-body mt-2">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab01">
                                                            <div class="form-group text-start">
                                                                <label class="tx-medium">Email or Username</label>
                                                                <input class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                                                    placeholder="Email or Username" type="text"
                                                                   required>

                                                                   <div>
                                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
				                                 <h6 class="fs-6 text-danger"><?php echo e($message); ?></h6>
			                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                   </div>
                                                            </div>
                                                            <div class="form-group text-start">
                                                                <label class="tx-medium">Password</label>
                                                                <input class="form-control border-end-0"
                                                                    placeholder="Enter your password"  name="password"
                                                                    type="password"
                                                                    data-bs-toggle="password" required>
                                                            <div>
                                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <h6 class="fs-6 text-danger"><?php echo e($message); ?></h6>
                                                                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>


                                                            </div>
                                                            <button type="submit" name="login"
                                                                class="btn btn-primary btn-block">Sign In</button>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                        <div class="text-start mt-4 ms-0 mb-3">
                                            <div class="mb-1"><a href="<?php echo e(route('password.request')); ?>">Forgot password?</a></div>
                                            <div>Don't have an account? <a href="<?php echo e(('register')); ?>">Register Here</a></div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>


            </div>
        </div>
        <!-- End Row -->





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/auth/login.blade.php ENDPATH**/ ?>
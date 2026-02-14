<?php
      $captcha = strtoupper(substr(md5(rand()), 0, 6)); // Generate random text
?>


<?php $__env->startSection('title', 'Sign up'); ?>
<?php $__env->startSection('content'); ?>





        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row row-sm">
                        <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 login_form rounded-start-11">
                            <div class="container-fluid">
                                <div class="row row-sm ">
                                    <div class="col-md-12 col-lg-12 px-lg-12 px-xl-12 d-flex flex-column py-6">
                                        <?php if(Session::has('status')): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo e(session('status')); ?>

                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center mt-4"  >
                                        <a href="/">
                                            <img src="<?php echo e(asset('storage/app/public/'.$settings->logo)); ?>" style="height: 60px" class="text-center" />
                                        </a>
                                    </div>
                                    <div class="card-body mt-2 mb-2">
                                        <h2 class="text-start mb-2">Sign Up for Free</h2>
                                        <p class="mb-4 text-muted tx-13 ms-0 text-start">It's Free to Sign up and only
                                            takes a minute.</p>

                                        <center>



                                        </center>

                                        <form method="POST" action="<?php echo e(route('register')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label class="tx-medium">Full Name</label>
                                                            <input class="form-control" placeholder="Enter your Name" type="text"
                                                            name="name" required="" value="<?php echo e(old('name')); ?>">

                                                        </div> <?php $__errorArgs = ['name'];
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

                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label class="tx-medium">Username</label>
                                                            <input class="form-control" placeholder="Enter Preferred Username"
                                                                type="text" name="username"  value="<?php echo e(old('username')); ?>"required="">

                                                        </div>
                                                        <?php $__errorArgs = ['username'];
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
                                            </div>






                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Email</label>
                                                <input class="form-control" placeholder="Enter your email" type="email"
                                                    autocomplete="username" name="email" value="<?php echo e(old('email')); ?>" required="">

                                            </div>
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
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <div class="form-group text-start">
                                                    <label class="tx-medium">Phone</label>
                                                    <input class="form-control" placeholder="Enter your phone" type="text"
                                                        maxlength="13" name="phone" value="<?php echo e(old('phone')); ?>" required="">

                                                </div>
                                                <?php $__errorArgs = ['phone'];
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



                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Gender</label>
                                                <select class="form-control select2-no-search" value="<?php echo e(old('gender')); ?>" name="gender"
                                                    required="">
                                                    <option label="Select Gender">
                                                    </option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <span class="alert-danger" style="float:right;"></span>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                            <label class="tx-medium">Country</label>
                                            <select class="form-control select2" name="country"  value="<?php echo e(old('country')); ?>"required="">
                                                <?php echo $__env->make('auth.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </select>

                                        </div>
                                    </div>


                                            </div>

                                        </div>

                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Password</label>
                                                <input class="form-control border-end-0"
                                                    placeholder="Enter your password" autocomplete="new-password"
                                                    type="password" data-bs-toggle="password" name="password"
                                                    required="">

                                                        </div>
                                                        <?php $__errorArgs = ['password'];
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

                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                    <label class="tx-medium">Confirm Password</label>
                                                    <input class="form-control border-end-0" placeholder="Confirm Password"
                                                        type="password"
                                                        data-bs-toggle="password"   name="password_confirmation" required="">

                                                    </div>

                                                </div>

                                                </div>

                                            </div>


                                            <?php if(Session::has('ref_by')): ?>
                                            <div class="form-group text-start">
                                                <label class="tx-medium"> Referral ID</label>
                                                <input id="referrer" class="form-control"
                                                    placeholder="Referral Code (Optional)" type="text"  value="<?php echo e(session('ref_by')); ?>"
                                                    name="ref_by" required>
                                            </div>
                                            <?php endif; ?>


                                            <div class="form-group text-start">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text p-0 border-0">
                                                            <link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet"><div style="height: 46px; line-height: 46px; width:4%; text-align: center; background-color: #003; color: #e2a606; font-size: 18px; font-weight: bold; letter-spacing: 4px; font-family: 'Henny Penny', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;"><span style="    float:right;     -webkit-transform: rotate(356deg);"><?php echo e($captcha); ?></span>        </div>

                                                        </span>
                                                    </div>
                                                    <input type="text" name="captcha" id="captcha" class="form-control font-weight-bold" placeholder="Enter Captcha" required>

                                                </div>

                                                <?php if($errors->has('captcha')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('captcha')); ?></span>
                                                <?php endif; ?>

                                         <input type='hidden' name='captcha_confirmation' value='<?php echo e($captcha); ?>'>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                <label class="tx-medium">Account Type</label>

                                                <select  class="form-control" name="account[]" data-live-search="true" tabindex="-1" aria-hidden="true" required multiple>
                                                    <option>Binary Option Trading</option>
                                                    <option>Forex Trading</option>
                                                    <option>Stock Trading</option>
                                                    <option>CryptoCurrency Investment</option>
                                                    <option>NFT Trading</option>
                                                  </select>
                                            </div>
                                        </div>


                                            <button type="submit" name="submit"
                                                class="btn btn-primary btn-block">Register</button>

                                        </form>
                                        <div class="text-start mt-4 ms-0 mb-3">
                                            <p class="mb-0">Already have an account? <a href="<?php echo e(route('login')); ?>">Sign In</a></p>
                                        </div>

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

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/auth/register.blade.php ENDPATH**/ ?>
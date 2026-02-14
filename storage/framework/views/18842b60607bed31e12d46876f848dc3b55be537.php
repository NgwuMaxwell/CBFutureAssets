<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?> </title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white; "> <b>ACCOUNT SETTINGS | PROFILE </b> </p></div>
</div>


<!-- TradingView Widget BEGIN -->
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
      "symbols": [{
          "proName": "FOREXCOM:SPXUSD",
          "title": "S&P 500"
        },
        {
          "proName": "FOREXCOM:NSXUSD",
          "title": "Nasdaq 100"
        },
        {
          "proName": "FX_IDC:EURUSD",
          "title": "EUR/USD"
        },
        {
          "proName": "BITSTAMP:BTCUSD",
          "title": "BTC/USD"
        },
        {
          "proName": "BITSTAMP:ETHUSD",
          "title": "ETH/USD"
        }
      ],
      "showSymbolLogo": true,
      "colorTheme": "dark",
      "isTransparent": false,
      "displayMode": "relative",
      "locale": "en"
    }
  </script>
</div>






<div class="row">
  <div class="col-sm-16 col-16">
    <div class="row  align-items-end  customer-profile-cover">
      <figure class="background"><img src="<?php echo e(asset('temp/boom/img/kk7.gif')); ?>" alt="Social cover image"> </figure>
      <div class="container mb-2">
        <div class="row  align-items-center p-2">
          <figure class="social-profile-pic"><img src="<?php echo e(asset('storage/app/public/photos/' . Auth::user()->profile_photo_path)); ?>" alt=""></figure>
          <div class="col-sm-16 col-lg-4 col-xl-4  profile-name">
            <i style="color:#0f0;font-size:20px" class="fa fa-check-circle blink_me"> <?php echo e(Auth::user()->account_verify=="Verified" ? 'Verified' : 'Not Verified'); ?></i>            <h2><?php echo e(Auth::user()->name); ?></h2>
            <p><?php echo e(Auth::user()->email); ?></p>
          </div>
          <div class="col-16 col-sm-16 col-lg-9 col-xl-9 text-right d-flex">
            <div class="col col-sm-5 col-lg-6 col-xl-6 ">
              <h4>Profit</h4>
              <h2><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?></h2>
            </div>
            <div class="col col-sm-6 col-lg-6 col-xl-6 ">
              <h4>Total Balance</h4>
              <h2><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></h2>
            </div>
            <div class="col col-sm-5 col-lg-6 col-xl-6 ">
              <h4>Total Bonus</h4>
              <h2><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->bonus, 2, '.', ',')); ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="container"> -->

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <div class="btn-group pull-right">
      <a href="<?php echo e(url('dashboard')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Account</span> <span class="text"><i class="fa fa-tachometer"></i></span></button></a>
      <a href="<?php echo e(url('dashboard/deposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="<?php echo e(route('withdrawalsdeposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="<?php echo e(route('profile')); ?>"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>
<hr>
<?php if(Session::has('message')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(Session::get('message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    </div>
 <?php endif; ?>

 <?php if(Session::has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(Session::get('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    </div>
 <?php endif; ?>
 <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <button type="button" class="text-white close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                            </div>
                      <?php endif; ?>
                      <hr>

<ul class="nav nav-tabs" role="tablist" style="float:center">
  <li class="nav-item"> <a class="nav-link btn-outline-light active" data-toggle="tab" href="#profile" role="tab" aria-expanded="true">Personal Profile</a> </li>
  <li class="nav-item"> <a class="nav-link btn-outline-light" data-toggle="tab" href="#funds" role="tab" aria-expanded="false">Account Records</a> </li>
  <li class="nav-item"> <a class="nav-link btn-outline-light" data-toggle="tab" href="#settings" role="tab" aria-expanded="false">Account Settings</a> </li>
  <!-- <li class="nav-item"> <a class="nav-link btn-outline-light" data-toggle="tab" href="#referrals" role="tab">Referrals</a> </li> -->
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="true">
    <div class="row">
      <div class="col-sm-16 col-lg-8 col-md-8">
        <h3 class="mt-2">Personal Profile Info</h3>
        <hr>
      </div>
      <form class="col-sm-16" method="POST" action="<?php echo e(route('profile.update')); ?>" >
      <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <div class="col-lg-12 col-md-12">
                <label><i class="fa fa-users"></i> Full Name</label>
                <input type="text" class="form-control" style="color:black" name="name" value="<?php echo e(Auth::user()->name); ?>" placeholder="" readonly required field_signature="1855613035" form_signature="17489083357771129849" visibility_annotation="true">
              </div>

            </div>
            <div class="form-group row">
              <div class="col-lg-8 col-md-8">
                <label><i class="fa fa-user"></i> Username</label>
                <input type="text" style="color:black" class="form-control" value="<?php echo e(Auth::user()->username); ?>" placeholder="" readonly field_signature="1318412689" form_signature="17489083357771129849" visibility_annotation="true">
              </div>
              <div class="col-lg-8 col-md-8">
                <label><i class="fa fa-at"></i> Email Address</label>
                <input type="email" style="color:black" class="form-control" value="<?php echo e(Auth::user()->email); ?>" placeholder="" readonly field_signature="2964261712" form_signature="17489083357771129849" visibility_annotation="true">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8 col-md-8">
                <div class="row">
                  <div class="col-lg-8">
                    <label><i class="fa fa-phone"></i> Phone Number</label>
                    <input type="text" class="form-control" style="color:black" value="<?php echo e(Auth::user()->phone); ?>" placeholder="" readonly  field_signature="1318412689" form_signature="17489083357771129849" visibility_annotation="true">
                  </div>
                  <div class="col-lg-8">
                    <label><i class="fa fa-map-marker"></i> Country</label>
                    <input type="text" name="country" class="form-control" value="<?php echo e(Auth::user()->country); ?>" placeholder=""  field_signature="1318412689" form_signature="17489083357771129849" visibility_annotation="true">
                  </div>
                </div>
              </div>

              <div class="col-lg-8 col-md-8">
                <div class="row">
                  <div class="col-lg-8">
                    <label><i class="fa fa-map-marker"></i> State/Province</label>
                    <input type="text" class="form-control" name="state" value="<?php echo e(Auth::user()->state); ?>" placeholder="" required="" field_signature="2649008370" form_signature="17489083357771129849" visibility_annotation="true">
                  </div>
                  <div class="col-lg-8">
                    <label><i class="fa fa-map-marker"></i> Postal/Zip Code</label>
                    <input type="text" class="form-control" name="zipcode" value="<?php echo e(Auth::user()->zipcode); ?>" placeholder="" field_signature="569224803" form_signature="17489083357771129849" visibility_annotation="true">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8 col-md-8">
                <label><i class="fa fa-map-marker"></i> Address</label>
                <textarea class="form-control" placeholder="Type here" name="address" rows="4" field_signature="1819258270" form_signature="17489083357771129849" visibility_annotation="true"><?php echo e(Auth::user()->address); ?></textarea>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="card ">
              <label><i class="fa fa-address-card"></i> Account Status</label><br>
              <!-- <label class="text-primary" for="">Verified</label> -->
              <label class="text-primary" for="">
                <i style="color:#0f0;font-size:20px" class="fa fa-check-circle blink_me">  <?php echo e(Auth::user()->account_verify=="Verified" ? 'Verified' : 'Not Verified'); ?></i>     </label>
              <label><i class="fa fa-sync"></i> Account Type</label><br>

              <?php
              $accounts = json_decode($userinfo->account, true); // Ensure it's an array
          ?>



                        <?php if(!empty( $accounts)): ?>
                       <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <label class="text-primary" for=""><?php echo e($act); ?><br></label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php else: ?>
                     <p>No accounts selected.</p>
                        <?php endif; ?>

              
            </div>
          </div>
        </div>
        <div class="mb-2 row">
          <div class="col-lg-16">
            <hr>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <button type="submit" name="client_update_info" class="btn btn-primary">Update Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane" id="funds" role="tabpanel" aria-expanded="false">
    <div class="row ">
      <div class="col-lg-16 col-md-16">
        <div class="form-group ">
          <h3 class="mt-2">Account Records</h3>
          <hr>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Type</th>
                <th></th>
                <th></th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Total Investment</th>
                <td></td>
                <td></td>
                <td><label><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?> </label></td>
              </tr>
              <tr>
                <th>Total Earnings</th>
                <td></td>
                <td></td>
                <td><label><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?> </label></td>
              </tr>
              <tr>
                <th>Total Balance</th>
                <td></td>
                <td></td>
                <td><label><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?>.00 </label></td>
              </tr>
              <tr>
                <th>Total Referral</th>
                <td></td>
                <td></td>
                <td><label><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?></label></td>
              </tr>
              <tr>
                <th>Total Bonus</th>
                <td></td>
                <td></td>
                <td><label><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->bonus, 2, '.', ',')); ?> </label></td>
              </tr>
             

            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-16">
        <hr>
        <a href="<?php echo e(url('dashboard/transactions')); ?>" style="float:left" name="client_update" class="btn btn-primary">View Transactions</a>
        <a href="<?php echo e(url('dashboard/history')); ?>" style="float:right" name="client_update" class="btn btn-primary">View Trade History</a>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-expanded="false">
    <div class="row">
      <div class="col-sm-8 col-md-8">
      <form method="POST" action="<?php echo e(route('updateuserpass')); ?>">
      <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>

          <div class="card">
            <div class="card-header">
              <span>
                <h3 style="color:crimson;text-align:center"></h3>
              </span>
              <span>
                <h3 style="color:green;text-align:center"></h3>
              </span>
              <h3 class="mt-2">CHANGE PASSWORD</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="example-number-input" class="col-16 col-form-label">Old Password</label>
                <div class="col-16">
                  <input class="form-control"  type="password" name="current_password" autocomplete="off" required>
                  <!-- <span style="color:crimson"></span> -->
                </div>
              </div>
              <div class="form-group row">
                <label for="example-number-input" class="col-16 col-form-label">New Password</label>
                <div class="col-16">
                  <input class="form-control" type="password" name="password" autocomplete="off" required>
                  <!-- <span style="color:crimson"></span> -->
                </div>
              </div>
              <div class="form-group row">
                <label for="example-number-input" class="col-16 col-form-label">Rewrite New Password</label>
                <div class="col-16">
                  <input class="form-control" type="password" name="password_confirmation"  autocomplete="off" autocomplete="off">
                  <!-- <span style="color:crimson"></span> -->
                </div>

              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert">

                        Once you change your password, you will be logged Out Automatically to login with your New Password
                    </div>
              <div class="form-group row">
                <div class="col-16">
                  <center><a href="#"><input class="btn btn-outline-secondary" type="reset" name="request_btn" value="clear"></a>
                  <button type="submit" class="btn btn-outline-primary">Change Password</button>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <hr>
      </div>
      <div class="col-sm-8 col-md-8">
        <form method="POST" action="<?php echo e(route('updateprofileimage')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-header">
              <h3 class="mt-2">CHANGE PROFILE IMAGE</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <br>
                <!-- <label for="example-number-input" class="col-16 col-form-label">Change Profile Image</label> -->
                <div class="col-16" align="center">
                  <img style="width:220px;height:220px;" class="form-control" src="<?php echo e(asset('storage/app/public/photos/' . Auth::user()->profile_photo_path)); ?>">
                  <input class="form-control" type="file" name="profileimage" >
                </div>
              </div>
              <div class="form-group row">
                <div class="col-16">
                  <center>
                    <!-- <a href="account"><input class="btn btn-outline-secondary" type="reset" name="request_btn" value="clear"></a> -->
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input class="btn btn-outline-primary" type="submit" value="Change Profile Image">
                  </center>
                </div>
              </div>
            </div>
          </div>
        </form>
        <hr>
        <hr>
      </div>

    </div>
  </div>
<br><br>
<div class="row">
  <div class="col-md-12">
    <div class="form-group row">
      <div class="col-10">
        <input type="text" style="color:black" class="form-control" id="referral_link" value="<?php echo e(Auth::user()->ref_link); ?>" readonly="" field_signature="282435034" form_signature="5555994432746311216" visibility_annotation="true">
      </div>
      <div class="col-6">
        <button type="button" onclick="referralFunction()" class="btn btn-primary">Copy Referral Link</button>
      </div>
    </div>
  </div>
</div>
</div>

<br><br>


</div>
</div>
<div style="position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;">

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/user/profile.blade.php ENDPATH**/ ?>
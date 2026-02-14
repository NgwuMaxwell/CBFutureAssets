<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> <?php echo e(Auth::user()->name); ?> |<?php echo e($title); ?></title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>Investment Plans</b> </p></div>
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
<!-- TradingView Widget END -->



<div class="row  align-items-center justify-content-between" style="margin-top:10px">

  <div class="col-16 col-sm-16">

    <div class="btn-group pull-left">
        <a href="<?php echo e(route('myplans', 'All')); ?>" class="btn btn-success mx-4 text-white my-2"> My Plans</a>

        </div>
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
    <div class="row mb-6">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-4">
            <div class="card border-0 py-6 px-4 mb-6 mb-xl-3">
                <div class="card-body">
                    <h2 class="card-title h3 text-uppercase text-primary text-center mb-3"><?php echo e($plan->increment_amount); ?> % ROI <?php echo e($plan->increment_interval); ?></h2>
                    <h3 class="card-text display-6 text-primary text-center">
                        <?php echo e($plan->name); ?> <span class="fs-3 fw-normal text-success"><?php echo e($plan->tag ?? ''); ?></span>
                    </h3>
                    <hr>

                    <ul class="list-unstyled mb-7">
                        <div class="text-center font-bold">
    <li class="mb-3 text-lg"><strong>Minimum Amount:</strong> <?php echo e($settings->currency); ?><?php echo e(number_format($plan->min_price)); ?></li>
    <li class="mb-3 text-lg"><strong>Maximum Amount:</strong> <?php echo e($settings->currency); ?><?php echo e(number_format($plan->max_price)); ?></li>
    <li class="mb-3 text-lg"><strong>Duration:</strong> <?php echo e($plan->expiration); ?></li>
</div>

                    </ul>

                    <form class="joinPlanForm" method="post" action="<?php echo e(route('joinplan')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="number" min="<?php echo e($plan->min_price); ?>" max="<?php echo e($plan->max_price); ?>"
                            name="iamount" placeholder=" <?php echo e($settings->currency); ?> <?php echo e($plan->min_price); ?> - <?php echo e($settings->currency); ?> <?php echo e($plan->max_price); ?> "
                            class="form-control h3">
                        <br>
                        <input type="hidden" name="duration" value="<?php echo e($plan->expiration); ?>">
                        <input type="hidden" name="id" value="<?php echo e($plan->id); ?>">

                        <button type="button" class="btn btn-block pricing-action btn-primary confirmJoinPlan">Join Plan</button>
                    </form>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div id="withdrawdisabled" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalCenterTitle">No Plans</h3>
                    </div>
                    <div class="modal-footer m-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.confirmJoinPlan').forEach(button => {
        button.addEventListener('click', function () {
            let form = this.closest('form'); // Get the specific form for this button

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to join this plan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Join",
                cancelButtonText: "No, Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the correct form dynamically
                }
            });
        });
    });
</script>

    
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/mplans.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->


<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


        <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?> </title>

        <div class="d-flex align-items-center p-3 bg-opacity-25 bg-dark rounded shadow-sm">
            <i class="fas fa-user-circle fa-2x text-white me-3"></i> <!-- User Icon -->
            <p class="mb-0 text-white fs-5"><b>Username:</b> <?php echo e(Auth::user()->name); ?></p>
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
            <a href="<?php echo e(route('user.signal.subscriptions')); ?>" class="btn btn-success mx-4  my-2">My Signal Plans</a>
            <a href="<?php echo e(route('user.signal.index')); ?>" class="btn btn-success mx-4  my-2">Signals</a>

        </div>
    <div class="btn-group pull-right">
      <a href="<?php echo e(url('dashboard')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Account</span> <span class="text"><i class="fa fa-tachometer"></i></span></button></a>
      <a href="<?php echo e(route('deposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="<?php echo e(route('withdrawalsdeposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="<?php echo e(route('profile')); ?>"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>
<hr>
<div class="row">





                <div class="container">
                    <h2 class="text-center">Subscribe to a Signal Plan</h2>

                    <!-- Display user balance -->
                    <div class="alert alert-info">
                        Your Balance: <strong><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2)); ?></strong>
                    </div>
<style>
    .btn-block {
        min-height: 80px; /* Ensure uniform height */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        white-space: normal; /* Allow wrapping */
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 100%; /* Prevents overflow */
    }

    .btn-block span {
        display: block; /* Ensures text respects width limits */
        max-width: 100%; /* Prevents text from expanding beyond button */
        word-wrap: break-word;
        overflow-wrap: break-word;
        text-wrap: balance;
    }

    .card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-body {
        flex-grow: 1; /* Ensures content fills the card */
    }
</style>

<div class="row">
    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card border border-1 border-primary h-100">
                <div class="card-header text-center">
                    <h5><?php echo e($plan->name); ?></h5>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="text-center">
                        <small>Signal Price</small>
                        <h3><?php echo e($settings->currency); ?><?php echo e(number_format($plan->price)); ?></h3>
                    </div>

                    <div class="d-grid gap-2">
                        <div class="btn btn-primary btn-block">
                            <p class="fw-bold mb-0">Signal</p>
                            <span>General trading signal</span>
                        </div>
                        <div class="btn btn-primary btn-block">
                            <span><?php echo e($plan->features); ?></span>
                        </div>
                        <div class="btn btn-primary btn-block">
                            <p class="fw-bold mb-0">Expert support</p>
                            <span>24/7 Experts support</span>
                        </div>
                        <div class="btn btn-primary btn-block">
                            <p class="fw-bold mb-0">Duration</p>
                            <span><?php echo e($plan->duration); ?> Weeks</span>
                        </div>
                    </div>

                    <div class="my-3 text-center">
                        <form id="subscribe-form-<?php echo e($plan->id); ?>" action="<?php echo e(route('user.signal.subscribe')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
                            <button type="button" class="btn btn-primary btn-block text-white" 
                                onclick="confirmSubscription(<?php echo e($plan->id); ?>, <?php echo e($plan->price); ?>)">
                                Subscribe Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


 




        </div>
        </div>
   

          <!-- JavaScript for Subscription Confirmation -->
          <script>
            function confirmSubscription(planId, price) {
                Swal.fire({
                    title: "Confirm Subscription",
                    text: "Are you sure you want to subscribe for $" + price + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Subscribe!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('subscribe-form-' + planId).submit();
                    }
                });
            }
        </script>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/signals/subscribe.blade.php ENDPATH**/ ?>
<?php $uc = app('App\Http\Controllers\User\UsersController'); ?>
<?php
    $array = \App\Models\User::all();
    $usr = Auth::user()->id;
?>

<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>


<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?></title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>My Plans</b> </p></div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if($numOfPlan > 0): ?>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <select name="sortplan" id="sortvalue"
                                    class="custom-select custom-select-sm form-control w-25">
                                    <option value="All">All</option>
                                    <option value="yes">Active</option>
                                    <option value="cancelled">Cancelled/Inactive</option>
                                    <option value="expired">Expired</option>
                                </select>
                                <a href="javascript:;" id="sortform" class="btn btn-primary btn-sm">Sort</a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="mt-4 row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="">
                                                <h6 class="text-light h6"><?php echo e($plan->dplan->name); ?></h6>
                                                <p class="text-muted">Amount - <span
                                                        class="amount"><?php echo e($settings->currency); ?><?php echo e(number_format($plan->amount)); ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <div class="d-flex justify-content-around">
                                                <div class="mr-3">
                                                    <h6 class="text-light bold">
                                                        <?php echo e($plan->created_at->addHour()->toDayDateTimeString()); ?></h6>
                                                    <span class="nk-iv-scheme-value date">Start Date</span>
                                                </div>
                                                <i class="fas fa-arrow-right text-muted"></i>
                                                <div class="ml-3">
                                                    <h6 class="text-light bold">
                                                        <?php echo e(\Carbon\Carbon::parse($plan->expire_date)->addHour()->toDayDateTimeString()); ?>

                                                    </h6>
                                                    <span class="nk-iv-scheme-value date">End Date</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <h6 class="text-light">
                                                <?php if($plan->active == 'yes'): ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php elseif($plan->active == 'expired'): ?>
                                                    <span class="badge badge-danger">Expired</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Inactive</span>
                                                <?php endif; ?>
                                            </h6>
                                            <span class="nk-iv-scheme-value amount">Status</span>
                                        </div>

                                        <a href="<?php echo e(route('plandetails', $plan->id)); ?>">
                                            <i class="fas fa-chevron-right fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="mt-4 row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="text-center card-body">

                                        <p>You do not have an investment plan at the moment or no value match your query.
                                        </p>
                                        <a href="<?php echo e(route('mplans')); ?>" class="px-3 btn btn-primary">Buy a plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(count($plans) > 0): ?>
                        <div class="row">
                            <div class="mt-2 col-12">
                                <?php echo e($plans->links()); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        var sortvalue = document.getElementById('sortvalue');
        var sortform = document.getElementById('sortform');
        let makepayurl = "<?php echo e(url('/dashboard/sort-plans/All')); ?>";
        sortform.href = makepayurl;
        sortvalue.addEventListener('change', function() {
            makepayurl = "<?php echo e(url('/dashboard/sort-plans/')); ?>" + '/' + sortvalue.value;
            sortform.href = makepayurl;
        })
    </script>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/myplans.blade.php ENDPATH**/ ?>
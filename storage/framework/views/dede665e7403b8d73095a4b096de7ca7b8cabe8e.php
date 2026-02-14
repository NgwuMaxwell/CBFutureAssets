<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->


    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

   
<div > <!-- Keeps space for alerts -->
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
       <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-alert','data' => []]); ?>
<?php $component->withName('error-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>


  <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?> </title>

  <div class="d-flex align-items-center p-3 bg-dark text-white rounded shadow">
    <i class="fas fa-user-circle fa-2x me-3"></i> <!-- User Icon -->
    <p class="mb-0 fs-5"><b>Username:</b> <?php echo e(Auth::user()->name); ?></p>
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
      <a href="<?php echo e(route('deposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="<?php echo e(route('withdrawalsdeposits')); ?>"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="<?php echo e(route('profile')); ?>"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>
<hr>

<div class="container ">

    <div class="row">
        <?php if($experts->count() > 0): ?>
        <?php $__currentLoopData = $experts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-lg overflow-hidden">
                <img src="<?php echo e(asset('storage/app/public/' . $expert->profile_picture)); ?>" class="card-img-top rounded-top" alt="<?php echo e($expert->name); ?>" style="height: 220px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold text-primary"><?php echo e($expert->name); ?></h5>
                    <p class="text-muted small">Professional Trader</p>
                    <hr>
                    <p class="card-text text-left">
                        <strong>Profit Share:</strong> <span class="text-primary"><?php echo e($expert->profit_share_percentage); ?>%</span><br>
                        <strong>Win Rate:</strong> <span class="text-success"><?php echo e($expert->win_rate); ?>%</span><br>
                        <strong>Minimum Capital:</strong> <span class="text-danger">$<?php echo e(number_format($expert->min_startup_capital, 2)); ?></span><br>
                        <strong>Total Profit:</strong> <span class="text-info">$<?php echo e(number_format($expert->total_profit, 2)); ?></span>
                    </p>
                    <?php
                        $isCopying = $activeCopies->where('expert_id', $expert->id)->where('status', 'active')->count() > 0;
                    ?>
                    <div class="mt-3">
                        <?php if($isCopying): ?>
                            <form id="stop-copying-form-<?php echo e($expert->id); ?>" action="<?php echo e(route('stopCopying', $expert->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-danger w-100 confirmStopCopying" data-id="<?php echo e($expert->id); ?>">Stop Copying</button>
                            </form>
                        <?php else: ?>
                            <form id="start-copying-form-<?php echo e($expert->id); ?>" action="<?php echo e(route('startCopying', $expert->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="button" class="btn btn-success w-100 confirmStartCopying" data-id="<?php echo e($expert->id); ?>">Start Copying</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">No experts available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

















</div>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Confirmation for Start Copying
    document.querySelectorAll('.confirmStartCopying').forEach(button => {
        button.addEventListener('click', function () {
            let expertId = this.getAttribute('data-id');
            let form = document.getElementById(`start-copying-form-${expertId}`);

            Swal.fire({
                title: "Start Copying?",
                text: "Are you sure you want to start copying this expert?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Start",
                cancelButtonText: "No, Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the correct form
                }
            });
        });
    });

    // Confirmation for Stop Copying
    document.querySelectorAll('.confirmStopCopying').forEach(button => {
        button.addEventListener('click', function () {
            let expertId = this.getAttribute('data-id');
            let form = document.getElementById(`stop-copying-form-${expertId}`);

            Swal.fire({
                title: "Stop Copying?",
                text: "Are you sure you want to stop copying this expert?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, Stop",
                cancelButtonText: "No, Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the correct form
                }
            });
        });
    });
</script>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/copy_trading/index.blade.php ENDPATH**/ ?>
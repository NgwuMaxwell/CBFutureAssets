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


  <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?></title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>Username :</b> <?php echo e(Auth::user()->name); ?> </p></div>
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
    <a href="<?php echo e(route('loans.my')); ?>" class="btn btn-primary mx-4 bg-lg  my-2">My Loan Applications</a>
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
    <div class="col-md-10">
        <div class="card ">
            <div class="card-body">


<div class="class my-2">
                    <h2>Apply for a Loan</h2>
                </div>

                    <form action="<?php echo e(route('loans.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="amount">Loan Amount (<?php echo e($settings->currency); ?>)</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="credit_facility">Credit Facility</label>
                            <select class="form-control " name="credit_facility"  required>
                                <option selected value="">Select Loan/Credit Facility</option>
                                                        <option value="Personal Home Loans">Personal Home Loans</option>
                                                        <option value="Joint Mortgage ">Joint Mortgage </option>
                                                        <option value="Automobile Loans ">Automobile Loans </option>
                                                        <option value="Salary loans">Salary loans</option>
                                                        <option value="Secured Overdraft">Secured Overdraft</option>
                                                        <option value="Contract Finance">Contract Finance</option>
                                                        <option value="Secured Term Loans">Secured Term Loans</option>
                                                        <option value="StartUp/Products Financing">StartUp/Products Financing</option>
                                                        <option value="Local Purchase Orders Finance">Local Purchase Orders Finance</option>
                                                        <option value="Operational Vehicles">Operational Vehicles</option>
                                                        <option value="Revenue Loans and Overdraft">Revenue Loans and Overdraft</option>
                                                        <option value="Retail TOD">Retail TOD</option>
                                                        <option value="Commercial Mortgage">Commercial Mortgage</option>
                                                        <option value="Office Equipment">Office Equipment</option>
                                                        <option value="Health Finance Product Guideline">Health Finance Product Guideline</option><option value="Health Finance">Health Finance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration (Months)</label>
                            <select class="form-control " name="duration"  required>
                                <option value="6">6 Months</option>
                                <option value="12">12 Months</option>
                                <option value="24">2 Years</option>
                                <option value="36">3 Years</option>
                                <option value="48">4 Years</option>
                                <option value="60">5 Years</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="income">Monthly Net Income (<?php echo e($settings->currency); ?>)</label>

                            <select class="form-control " name="monthly_income" required>
                                <option value="2,000-5,000">$2,000- $5,000</option>
                                <option value="6,000-10,000">$6,000-$10,000</option>
                                <option value="11,000-20,000">$11,000-$20,000</option>
                                <option value="21,000-50,000">$21,000-$50,000</option>
                                <option value="100,000 and above">$100,000 and above</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose of Loan</label>
                            <textarea class="form-control" name="purpose" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; max-width: 700px;">Submit Application</button>
                    </form>




</div>

</div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/loans/apply.blade.php ENDPATH**/ ?>
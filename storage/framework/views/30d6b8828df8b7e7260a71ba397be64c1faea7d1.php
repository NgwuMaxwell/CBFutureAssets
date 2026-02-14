<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> <?php echo e(Auth::user()->name); ?> | <?php echo e($title); ?> </title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>WITHDRWAL</b> </p></div>
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





<div class="card" id="hip">
    <div class="card-header">
        <h5 class="font-weight-bold">
            <span style="float:left">Withdrawal notice</span>
            <span style="float:right;font-size:15px">Balance : <span style="color:green"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></span></span>
        </h5>
    </div>
    <div class="card-body">
        <div class="container_wizard wizard-bordered">
            <div class="row">



            <div class=""
            style="width:100%; max-width: 100%; background-color: #262b3e; border-radius: 10px; color: #fff; padding: 10px; font-size: 14px; margin-bottom: 10px">
                <div class="">
                    <p style="color: #fff; font-size: 18px">Withdrawal in Progress</p>
                    <br>
                    <p style="color: #fff;"><?php echo e(Auth::user()->step == 1? '25' : (Auth::user()->step == 2? '99' : (Auth::user()->step == 3? '70' : (Auth::user()->step== 4?  '85' : '99')))); ?>% Completed</p>
                    <progress style="width: 100%" value="<?php echo e(Auth::user()->step== 1? '25' : (Auth::user()->step == 2? '99' : (Auth::user()->step == 3? '70' : (Auth::user()->step == 4?  '85' : '99')))); ?>" max="100" />
                </div>
            </div>

<div class="">



						<div class="list-group">

  <p class="list-group-
  item"  >



      <strong>Important Notice: </strong>


      <?php if(Auth::user()->step == 1): ?>
    For the successful processing of your withdrawal request, a broker commission fee code is required. This unique confirmation code ensures the secure and efficient transfer of your funds. Kindly provide your broker commission fee code to proceed with the withdrawal process. Should you have any questions or need assistance, please do not hesitate to reach out to our support team. Thank you for your cooperation and understanding.
<?php elseif(Auth::user()->step == 2): ?>
    Anti-Theft security code is required. Please provide your unique security code before withdrawals can be processed.
<?php elseif(Auth::user()->step == 3): ?>
    International Monetary Fund code is required. Please provide your payment confirmation code to proceed.
<?php elseif(Auth::user()->step == 4): ?>
    Cost of Transfer code is required. Please provide your COT code to proceed.
<?php else: ?>
    Taxation code is required. Please provide your Taxation code to conclude your withdrawal.
<?php endif; ?>

</p>


<form action="<?php echo e(route('brokercode')); ?>" method="POST">
     <?php echo csrf_field(); ?>

              <div class="">



                        <div class="form-group ">
                            <label></label>
                            <input class="form-control" style="height: 3.25rem; border-radius: 0px; border: 1px solid #ccc; font-family: 'Montserrat', sans-serif"
                            placeholder="* * * * * *" type="number" value="" name="pin" id="pin" required>
                            <span class="help-block"></span>
                        </div>

                        <input type="hidden" value="<?php echo e(Auth::user()->step); ?>" name="step">
						<a href="<?php echo e(route('withdrawalsdeposits')); ?>" class="btn btn-warning btn-lg" style="width: 100%; max-width: 200px;">Return</a>
					<input type="submit" value="Verify" name="submit" class="btn btn-success btn-lg" style="width: 100%; max-width: 200px;">
					</div>
                    </form>


</div>


	</div>

</div>
	</div>
</div>

</div>










<br><br>


</div>


</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/withdraw.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> <?php echo e(Auth::user()->name); ?> |<?php echo e($title); ?> </title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>HISTORY</b> </p></div>
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




<div class="row">
    <div class="col-sm-16 col-md-16">
        <div class="card">
            <div class="card-header align-items-start justify-content-between flex">
                <h4 class="pull-left">HISTORY</h4>
                <ul class="nav nav-pills card-header-pills pull-right">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-link btn-round" data-toggle="collapse" data-target="#transaction_deposit"><i class="fa fa-chevron-down"></i></button>
                    </li>
                </ul>
            </div>
            <div class="card-body" id="transaction_deposit">



                    <div class="col-md-16">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                    <thead class="font-weight-bolsd">
                                        <tr>
                                            <th>Asset</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $t_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($history->plan); ?></td>
                                                <td><?php echo e($settings->currency); ?><?php echo e(number_format($history->amount, 2, '.', ',')); ?>

                                                </td>
                                                <td><?php echo e($history->type); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($history->created_at)->toDayDateTimeString()); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo e($t_history->links()); ?>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/thistory.blade.php ENDPATH**/ ?>
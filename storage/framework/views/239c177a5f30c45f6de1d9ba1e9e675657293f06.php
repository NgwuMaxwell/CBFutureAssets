<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

        <!--<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>-->
        <!--<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>-->
        <!--<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>-->
  <title> <?php echo e(Auth::user()->name); ?> |<?php echo e($title); ?></title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>Trading</b> </p></div>
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
        <a href="<?php echo e(route('user.trades.history')); ?>" class="btn btn-success mx-4  my-2">Trade History</a>

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

<div class="row">


  <style>
.blinking-dot {
    width: 10px;
    height: 10px;
    background-color: green;
    border-radius: 50%;
    animation: blink 1s infinite;
}

@keyframes  blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}
</style>

  <div class="col-md-6 col-lg-6 col-xl-6">
    <div class="card full-screen-container">
      <div class="card-header align-items-start justify-content-between flex" style="">
      <h5 class="card-title pull-left" style="color:white; display: flex; align-items: center; gap: 5px;">
    <b style="color: green;">Live Trading</b>
    <span class="blinking-dot"></span>



        <span style="float:right;font-size:15px">Balance : <span style="color:green"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></span></span>
    </h5>


        <ul class="nav nav-pills card-header-pills pull-right">
          <!-- <li class="nav-item">
            <button type="" class="btn btn-sm btn-outline-primary btn-round" id="livechart"><i class="fa fa-print"></i> <span class="">Get Pdf</span></button>
          </li> -->
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round fullscreen-btn"><i class="fa fa-arrows-alt"></i></button>
          </li>
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round" data-toggle="collapse" data-target="#demo"><i class="fa fa-chevron-down"></i></button>
          </li>
        </ul>
      </div>

      <form id="tradeForm" action="<?php echo e(route('trades.store')); ?>" method="POST" class="p-3 text-white rounded">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Asset Type</label>
                                <select name="asset_type" id="asset_type"  class="form-control" required>
                                    <option value="crypto">Crypto</option>
                                    <option value="forex">Forex</option>
                                    <option value="stock">Stock</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Asset Name</label>

        <div id="trade_pair1_container" style='text-align: left;'>
        <select name="asset_name" class="form-control" style='text-align: left;'>
            <option value="USDT/BTC" data-icon='../includes/icons/bitcoin.png'>USDT/BTC</option>
            <option value="USDT/ETH" data-icon='../includes/icons/eth.png'>USDT/ETH</option>
            <option value="USDT/TRX" data-icon='../includes/icons/tron.png'>USDT/TRX</option>
            <option value="USDT/SOL" data-icon='../includes/icons/Solana_logo.png'>USDT/SOL</option>
            <option value="USDT/LTC" data-icon='../includes/icons/lite.png'>USDT/LTC</option>
            <option value="USDT/BNB" data-icon='../includes/icons/bnb.png'>USDT/BNB</option>
            <option value="USDT/LINK" data-icon='../includes/icons/link.png'>USDT/LINK</option>
            <option value="USDT/FTT" data-icon='../includes/icons/ftt.png'>USDT/FTT</option>
            <option value="USDT/SHIB" data-icon='../includes/icons/shib.png'>USDT/SHIB</option>
            <option value="USDT/ETC" data-icon='../includes/icons/etc.png'>USDT/ETC</option>
            <option value="USDT/TFUEL" data-icon='../includes/icons/tfuel.png'>USDT/TFUEL</option>
            <option value="USDT/ADA" data-icon='../includes/icons/ada.png'>USDT/ADA</option>
            <option value="USDT/VET" data-icon='../includes/icons/vet.png'>USDT/VET</option>
        </select>
        </div>


        <div id="trade_pair2_container" style='text-align: left; display: none'>
        <select name="asset_name" id="trade_pair_two" class="form-control">
            <option value="FACEBOOK INC" data-icon='../includes/icons/facebook.png' >FACEBOOK INC</option>
            <option value="BOEING CO" data-icon='../includes/icons/boeing.png' >BOEING CO</option>
            <option value="APPLE INC" data-icon='../includes/icons/apple.png' >APPLE INC</option>
            <option value="AMAZON COM INC" data-icon='../includes/icons/amazon.png' >AMAZON COM INC</option>
            <option value="MICROSOFT CORP" data-icon='../includes/icons/microsoft.png' >MICROSOFT CORP</option>
            <option value="NETFLIX INC" data-icon='../includes/icons/netflix.png' >NETFLIX INC</option>
            <option value="MICRON TECHNOLOGY INC" data-icon='../includes/icons/mircon.png' >MICRON TECHNO...</option>
            <option value="NVIDIA CORP" data-icon='../includes/icons/nvidia.png' >NVIDIA CORP</option>
            <option value="CANOPY GROWTH INCORPORATION" data-icon='../includes/icons/canopy.png' >CANOPY GROW...</option>
            <option value="TESLA INC" data-icon='../includes/icons/tesla.png' >TESLA INC</option>
            <option value="TWITTER INC" data-icon='../includes/icons/twitter.png' >TWITTER INC</option>
            <option value="SBERBANK RUSSIA" data-icon='../includes/icons/sberbank.png' >SBERBANK RUS...</option>
            <option value="CRONOS GROUP INC" data-icon='../includes/icons/cronos.png' >CRONOS GROUP INC</option>
            <option value="PENNYMAC FINCANCIAL SERVICES INC" data-icon='../includes/icons/pennymac.png' >PENNYMAC FINCA...</option>
            <option value="PAN AMERICAN SILVER CORP" data-icon='../includes/icons/pan.png' >PAN AME...</option>
            <option value="BANK OF AMERICAN CORPORATION" data-icon='../includes/icons/bank.png' >BANK OF AMERI...</option>
            <option value="INTEL CORP" data-icon='../includes/icons/intel.png' >INTEL CORP</option>
            <option value="RELIANCE INDS" data-icon='../includes/icons/reliance.png' >RELIANCE INDS</option>
            <option value="ELECTRONIC ARTS INC" data-icon='../includes/icons/electronic.png' >ELECTRONIC AR...</option>
            <option value="SAMSUNG LIFE" data-icon='../includes/icons/samsung.png' >SAMSUNG LIFE</option>
            <option value="SHOPIFY INC" data-icon='../includes/icons/shopify.png' >SHOPIFY INC</option>
            <option value="PAYPAL HONDINGS INC" data-icon='../includes/icons/paypal.png' >PAYPAL HONDINGS INC</option>
        </select>
        </div>

        <div id="trade_pair3_container" style='text-align: left;  display: none '>
        <select name="asset_name" id="trade_pair_three" class="form-control" >
            <option value="GBPUSD" data-icon='../includes/icons/gbpusd.png'>GBPUSD, Pound vs US Dollar</option>
            <option value="EURAUD" data-icon='../includes/icons/euraud.png'>EURAUD, Euro vs Australian Dollar</option>
            <option value="EURCHF" data-icon='../includes/icons/eurchf.png'>EURCHF, Euro vs Swiss Franc</option>
            <option value="EURGBP" data-icon='../includes/icons/eurgbp.png'>EURGBP, Euro vs Great Britain</option>
            <option value="GBPCAD" data-icon='../includes/icons/gbpcad.png'>GBPCAD, Great Britain Pound vs Canadian Dollar</option>
            <option value="NZDUSD" data-icon='../includes/icons/nzdusd.png'>NZDUSD, New Zealand vs US Dollar</option>
            <option value="EURNZD" data-icon='../includes/icons/eurusd.png'>EURNZD, Euro vs New Zealand</option>
            <option value="CADJPYm" data-icon='../includes/icons/cadjpym.png'>CADJPYm, Canadian Dollar vs Japanise Yen AUDJPYm, Australian Dollar vs Japanise Yen</option>
            <option value="USDCHF" data-icon='../includes/icons/eurchf.png'>USDCHF, US Dollar vs Swiss Franc</option>
            <option value="GBPAUD" data-icon='../includes/icons/gbpaud.png'>GBPAUD, Great Britain Pound vs Australian Dollar</option>
            <option value="USDTRY" data-icon='../includes/icons/usdtry.png'>USDTRY, US Dollar vs Turkish New Lira</option>
            <option value="USD vs THB" data-icon='../includes/icons/usdthb.png'>USD vs THB</option>
            <option value="AUD vS USD" data-icon='../includes/icons/gbpaud.png'>AUD vS USD</option>
            <option value="CAD vs JPY" data-icon='../includes/icons/cadjpym.png'>CAD vs JPY</option>
            <option value="EURUSD" data-icon='../includes/icons/eurusd.png'>EURUSD, Euro vs US Dollar</option>
            <option value="USDRUB" data-icon='../includes/icons/usdrub.png'>USDRUB, US Dollar vs Russian Ruble</option>
            <option value="XAUUSD" data-icon='../includes/icons/xauusd.png'>XAUUSD, Gold vs US Dollar</option>
            <option value="NZDJPY" data-icon='../includes/icons/cadjpym.png'> NZDJPY, New Zealand Dollar vs Japanise Yen</option>
        </select>
        </div>


                            </div>

                            <div class="form-group">



    <label class="block font-semibold text-sm mb-2">Leverage:</label>

    <div class="flex items-center gap-1 mb-1">
        <input type="text" name="leverage" id="leverageValue" class=" text-black text-center px-3 py-2 rounded w-20" value="5x" readonly>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(2)">2x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(3)">3x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(4)">4x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(5)">5x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(10)">10x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(25)">25x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(30)">30x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(40)">40x</button>

        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(50)">50x</button>
        <button type="button" class="px-3 py-1 bg-blue-600 rounded" onclick="setLeverage(60)">60x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(70)">70x</button>
        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(80)">80x</button>

        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(90)">90x</button>

        <button type="button" class="px-3 py-1 bg-gray-700 rounded" onclick="setLeverage(100)">100x</button>
    </div>

    <input type="range" id="leverageSlider" min="1" max="100" value="5" class="form-control" oninput="updateLeverage()">


<script>
    function updateLeverage() {
        const slider = document.getElementById('leverageSlider');
        const leverageValue = document.getElementById('leverageValue');
        leverageValue.value = slider.value + 'x';
    }

    function setLeverage(value) {
        document.getElementById('leverageSlider').value = value;
        document.getElementById('leverageValue').value = value + 'x';
    }
</script>

                                <!-- <label>Leverage</label>
                                <input type="number" name="leverage" class="form-control" min="1" max="100" required> -->




                            </div>

                            <div class="form-group">
                                <label>Trade Duration (in minutes)</label>

                                <select name="duration" type="number" class="form-control" id='time_select' onchange='time_value(this)'>
                                <option value="1">1 Minute</option>
                        <option value="5">5 Minutes</option>
                        <option value="15">15 Minutes</option>
                        <option value="30 ">30 Minutes</option>
                        <option value="60">1 Hour</option>
                        <option value="240">4 Hours</option>
                        <option value="1440">1 Day</option>
                        <option value="2880">2 Days</option>
                        <option value="10080">7 Days</option>
                        </select>



                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" name="amount" placeholder='Enter trade amount ' class="form-control" step="0.01" required>
                            </div>


                            <div class="form-group" style="display: flex; gap: 10px; align-items: center;">
                                <div>
                                    <label for="take_profit">Take Profit :</label>
                                    <input type="number" step="any" name="take_profit"   class='form-control'value="0.00">
                                </div>
                                <div>
                                    <label for="stop_loss">Stop Loss :</label>
                                    <input type="number" step="any" name="stop_loss" class='form-control' value="0.00">
                                </div>
                            </div>


                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-success btn-md confirm-trade" data-action="buy" style="width: 100%; max-width: 200px;">Buy</button>
                                    <button type="button" class="btn btn-danger btn-md confirm-trade" data-action="sell" style="width: 100%; max-width: 200px;">Sell</button>

                            </div>
                            <input type="hidden" name="action" id="tradeAction">
                        </form>
    </div>
  </div>

 <div class="col-md-10 col-lg-10 col-xl-10">
    <div class="card full-screen-container">
      <div class="card-header align-items-start justify-content-between flex" style="">
        <h5 class="card-title  pull-left" style="color:white"><b>Live Trading Chart</b></h5>
        <ul class="nav nav-pills card-header-pills pull-right">
          <!-- <li class="nav-item">
            <button type="" class="btn btn-sm btn-outline-primary btn-round" id="livechart"><i class="fa fa-print"></i> <span class="">Get Pdf</span></button>
          </li> -->
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round fullscreen-btn"><i class="fa fa-arrows-alt"></i></button>
          </li>
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round" data-toggle="collapse" data-target="#demo"><i class="fa fa-chevron-down"></i></button>
          </li>
        </ul>
      </div>
      <div id="tablelivechart">
        <!-- chart -->
            <!-- chart -->
            <div class="tradingview-widget-container" id="demo">
          <div id="tradingview_e705a" style="height:685px"></div>
          <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
          <script type="text/javascript">
            new TradingView.widget({
              "autosize": true,
              // "width": 1200,
              // "height": 610,
              "symbol": "NASDAQ:AMZN",
              "interval": "1",
              "timezone": "America/Los_Angeles",
              "theme": "dark",
              "style": "1",
              "locale": "en",
              "toolbar_bg": "#f1f3f6",
              "enable_publishing": false,
              "hide_side_toolbar": false,
              "allow_symbol_change": true,
              "details": true,
              "studies": [
                "AwesomeOscillator@tv-basicstudies",
                "MACD@tv-basicstudies"
              ],
              "container_id": "tradingview_e705a"
            });
          </script>
        </div>
        <!-- chart end -->
      </div>
    </div>
  </div>


  <div class="col-sm-16 col-md-16">
        <div class="card">
            <div class="card-header align-items-start justify-content-between flex">
                <h4 class="pull-left"> Trades Transactions</h4>
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
                    <ul class="mb-3 nav nav-pills nav-pills-icon nav-justified" id="pills-tab" role="tablist">
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation ">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <span class="d-block">
                                    <i class="bi bi-wallet-fill fs-3"></i>
                                </span>
                                <span class="mt-2 ">Open</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <span class="d-block">
                                   <i class="bi bi-graph-down fs-3"></i>
                                </span>
                                <span class="mt-2 ">Closed</span>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table  id="DeposTbl" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Asset Name</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Leverage</th>
                                            <th>Take Profit</th>
                                            <th>Stop Loss</th>
                                            <th>Status</th>
                                            <th>Result</th>
                                            <th>Profit/Loss</th>
                                            <th>Opened At</th>
                                            <th>Expires At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $tradesopen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($trade->asset_name); ?></td>
                                                <td><?php echo e(ucfirst($trade->action)); ?></td>
                                                <td>$<?php echo e(number_format($trade->amount, 2)); ?></td>
                                                <td><?php echo e($trade->leverage); ?>x</td>
                                                <td><?php echo e($trade->take_profit); ?></td>
                                                <td><?php echo e($trade->stop_loss); ?></td>
                                                <td><?php echo e(ucfirst($trade->status)); ?></td>
                                                <td> <?php if($trade->result=='PENDING'): ?>
                                                    <span class="badge badge-warning">PENDING</span>

                                                    <?php else: ?>

                                                        <span class="badge <?php echo e($trade->result == 'WIN' ? 'badge-success' : 'badge-danger'); ?>">
                                                            <?php echo e($trade->result); ?>

                                                        </span>
                                                    <?php endif; ?></td>
                                                <td>
                                                    <?php if($trade->profit_loss !== null): ?>
                                                        <?php echo e($trade->profit_loss >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($trade->profit_loss), 2)); ?>

                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(\Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i')); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="9">No trades found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                                <?php echo e($tradesopen->links()); ?>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                            <table  id="WithdrawTbl" class="table table-hover ">
        <thead>
            <tr>
                <th>#</th>
                <th>Asset Name</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Leverage</th>
                <th>Take Profit</th>
                <th>Stop Loss</th>
                <th>Status</th>
                <th>Result</th>
                <th>Profit/Loss</th>
                <th>Opened At</th>
                <th>Expires At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $tradesclosed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($trade->asset_name); ?></td>
                    <td><?php echo e(ucfirst($trade->action)); ?></td>
                    <td>$<?php echo e(number_format($trade->amount, 2)); ?></td>
                    <td><?php echo e($trade->leverage); ?>x</td>
                    <td><?php echo e($trade->take_profit); ?></td>
                    <td><?php echo e($trade->stop_loss); ?></td>
                    <td><?php echo e(ucfirst($trade->status)); ?></td>
                   <td> <?php if($trade->result=='PENDING'): ?>
                    <span class="badge badge-warning">PENDING</span>

                    <?php else: ?>

                        <span class="badge <?php echo e($trade->result == 'WIN' ? 'badge-success' : 'badge-danger'); ?>">
                            <?php echo e($trade->result); ?>

                        </span>
                    <?php endif; ?></td>
                    <td>
                        <?php if($trade->profit_loss !== null): ?>
                            <?php echo e($trade->profit_loss >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($trade->profit_loss), 2)); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(\Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9">No trades found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($tradesclosed->links()); ?>

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
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tradeButtons = document.querySelectorAll('.confirm-trade');

        tradeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const action = this.getAttribute('data-action');

                Swal.fire({
                    title: `Confirm ${action.toUpperCase()} Trade`,
                    text: "Are you sure you want to execute this trade?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: action === 'buy' ? "#28a745" : "#dc3545",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: `Yes, ${action.toUpperCase()} Now`,
                    cancelButtonText: "No, Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('tradeAction').value = action;
                        document.getElementById('tradeForm').submit();
                    }
                });
            });
        });
    });
</script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/trades/trade.blade.php ENDPATH**/ ?>
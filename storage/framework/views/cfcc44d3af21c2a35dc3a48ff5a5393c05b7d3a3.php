<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->


    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


<div> <!-- Keeps space for alerts -->
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

<div class="container py-5">
    <div class="row">
        <!-- NFT Image -->
        <div class="col-md-6 text-center">
            <img src="<?php echo e(asset('storage/app/public/' . $nft->image)); ?>" alt="<?php echo e($nft->name); ?>" class="nft-image" height="400">
        </div>

        <!-- NFT Details -->
        <div class="col-md-6 details-container">
            <h2><?php echo e($nft->name); ?></h2>
            <p><?php echo e($nft->description); ?></p>
            <h4>Price: <?php echo e($nft->price); ?> ETH</h4>
            <div class="d-flex align-items-center mb-3">
                <img src="<?php echo e(asset('storage/app/public/photos/' . Auth::user()->profile_photo_path)); ?>" class="owner-img me-2" width="30" height="30">
                <span>Owned by: <strong><?php echo e($nft->user->name); ?></strong></span>
            </div>

            <!-- Buy Now Button with Confirmation -->
            <form id="buy-form" action="<?php echo e(route('nfts.buy', $nft->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="button" class="btn btn-success w-100 mt-2" id="buy-button">Buy Now</button>
            </form>


            <!-- Place a Bid -->
            <?php if($nft->status == 'available'): ?>
            <div class="mt-4">
                <h4>Place a Bid (ETH)</h4>



                <form id="bid-form" action="<?php echo e(route('bids.place', $nft->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <input type="number" name="amount" class="form-control bid-amount" placeholder="Enter your bid amount (ETH)" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg" style="width: 100%; max-width: 200px;" id="bid-button">
                        Submit Bid
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


             <!-- Bid History -->
    <h3 class="mt-4">Bid History</h3>
    <ul class="list-group mb-3">
        <?php $__currentLoopData = $nft->bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?php echo e($bid->user->username); ?> placed a bid of <?php echo e($bid->amount); ?>eth</span>
                <small class="text-muted"><?php echo e($bid->created_at->diffForHumans()); ?></small>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>



</div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('buy-button').addEventListener('click', function (event) {
            Swal.fire({
                title: 'Confirm Purchase',
                text: 'Are you sure you want to buy this NFT?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Buy Now',
                cancelButtonText: 'No, Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('buy-form').submit();
                }
            });
        });
    });
    </script>


<!-- SweetAlert2 Script for Bidding -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let bidButton = document.getElementById('bid-button');
        let bidInput = document.querySelector('.bid-amount'); // Selects by class in case ID is missing

        if (!bidButton || !bidInput) {
            console.error("Bid button or input field not found!");
            return;
        }

        bidButton.addEventListener('click', function (event) {
            let bidAmount = bidInput.value;

            if (!bidAmount || bidAmount <= 0) {
                Swal.fire('Error', 'Please enter a valid bid amount.', 'error');
                return;
            }

            Swal.fire({
                title: 'Confirm Your Bid',
                text: `Are you sure you want to place a bid of ${bidAmount} ETH?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Place Bid',
                cancelButtonText: 'No, Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('bid-form').submit();
                }
            });
        });
    });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/nfts/details.blade.php ENDPATH**/ ?>
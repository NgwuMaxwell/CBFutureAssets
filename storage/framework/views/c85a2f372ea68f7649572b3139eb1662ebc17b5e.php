<?php
use App\Models\Wdmethod;
$dmethods =  $paymethod = Wdmethod::where(function ($query) {
            $query->where('type', '=', 'withdrawal')
                ->orWhere('type', '=', 'both');
        })->where('status', 'enabled')->orderByDesc('id')->get();
?>


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
            <span style="float:left">Request Withdrawal</span>
            <span style="float:right;font-size:15px">Balance : <span style="color:green"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></span></span>
        </h5>
    </div>
    <div class="card-body">
        <div class="container_wizard wizard-bordered">

        <form method="POST" action="<?php echo e(route('completewithdrawal')); ?>">

          <?php echo csrf_field(); ?>

                <div class="row setup-content tab" >
                    <div class="col-sm-16">
                        <div class="row">
                            <div class="col-sm-16">
                                <h3 class="text-white mb-2">Payment Details</h3>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-16 col-md-8 col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Withdrawal Type</label>
                                    <select onchange="methodCheck(this)" name="method" value="" class="form-control" required>
                                        <option disabled="" selected="" value=""> -- select withdrawal method -- </option>
                                        <?php $__currentLoopData = $dmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dmethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dmethod->name); ?>" data-method="<?php echo e($dmethod->methodtype); ?>"><?php echo e($dmethod->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- <option value="Bitcoin">Bitcoin</option>
                                        <option value="Ethereum">Ethereum</option>
                                        <option value="Usdt">Usdt</option> -->
                                    </select>
                                </div>
                                <div class="form-group" id="cryptot" style="display:none;">
                                    <label class="form-control-label">Wallet Address</label>
                                    <input type="text" id="walletaddress" name="wallet_address" class="form-control" autocomplete="off">
                                </div>

                                <div id="bankt" style="display:none;">
                                    <div class="form-group">
                                        <label class="form-control-label">Bank Name</label>
                                        <input type="text" maxlength="100" class="form-control" name="bankname" placeholder="Enter Bank Name" id="bankname" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Account Name</label>
                                        <input type="text" maxlength="100" class="form-control" name="account_name" placeholder="Enter Account Name" id="	account_name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Account Number</label>
                                        <input type="number" minlength="10" maxlength="12" class="form-control" name="account_number" placeholder="Enter Account Number" autocomplete="off" id="accountnumber" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label class="form-control-label">Amount $</label> -->
                                        <input type="hidden" step="any" min="1" class="form-control" name="2" value="2" id="amountb" >
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Amount <?php echo e($settings->currency); ?></label>
                                        <input type="number" class="form-control" name="amount" placeholder="0.00" required autocomplete="off">
                                    </div>


                            </div>
                            <div class="col-sm-16 col-md-8 col-lg-10">
                                <div align="left" class="text hidden-sm-down hidden-md-down">
                                    <span class="text">
                                        <span style="font-weight:bold">Withdrawing Funds – How Does It Work?</span><br>
                                        At our platform, we have designed our withdrawal process to be as easy and secured as our funding process.
                                        To begin the withdrawal process first fill your account information then select your preferred withdrawal
                                        method and then type in the amount you want to withdraw, verify your identity by uploading a valid ID
                                        and click "Request Withdrawal".
                                        <br>
                                        <span style="font-weight:bold">What Methods Are There For Withdrawal Of Funds?</span><br>
                                        We provide provide better withdrawal methods like (Bitcoin, PayPal, Bank Transfer and lot more).
                                        <br>
                                        <span style="font-weight:bold">Must Withdrawal Requests Only Be Made At Certain Times?</span><br>
                                        Requests for withdrawals can be made at any time via our platform. The requests will be processed immediately, and during the relevant financial institutions’ business hours.
                                        <br>
                                        <span style="font-weight:bold">Is There A Withdrawal Limit?</span><br>
                                        Withdrawals are capped at the amount of funds that are currently in the account.
                                        <br>
                                        <span style="font-weight:bold">How Long Does It Take To Get My Money?</span><br>
                                        Withdrawal requests are addressed and handled as quickly as possible.
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                          <div class="col-sm-16 ">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <button class="btn btn-danger nextBtn btn-lg pull-left" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="submit"  class="btn btn-success btn-lg pull-left" >Request Withdrawal</button>
                          </div>
                        </div>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>


  </div>
  </div>

<br>
<br>


<script>

function methodCheck(that)
{

    // Read the custom data attribute instead of 'value'
    const method = that.options[that.selectedIndex].getAttribute('data-method');
    if (method == "crypto" )
    {
        document.getElementById("cryptot").style.display = "block";
        document.getElementById("walletaddress").placeholder = 'Enter ' + that.value + ' Wallet Address';
    }
    else
    {
        document.getElementById("cryptot").style.display = "none";
    }
    if (method == "currency")
    {
        document.getElementById("bankt").style.display = "block";
    }
    else
    {
        document.getElementById("bankt").style.display = "none";
    }
}
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "flex";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("withdraw_form").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepwizard-step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/complexanalysis/public_html/app.complexanalysis.sbs/resources/views/user/withdrawals.blade.php ENDPATH**/ ?>
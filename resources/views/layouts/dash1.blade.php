@php
use App\Models\Wdmethod;
$dmethods =  $paymethod = Wdmethod::where(function ($query) {
            $query->where('type', '=', 'deposit')
                ->orWhere('type', '=', 'both');
        })->where('status', 'enabled')->orderByDesc('id')->get();
@endphp

<!DOCTYPE html>
<!-- saved from url=(0034)#account -->
<html lang="en" data-arp-injected="true" style="height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=0.726, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('storage/app/public/photos/'.$settings->favicon)}}" type="image/png"/>
  <link rel="stylesheet" href="{{ asset('temp/home/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dash/css/bootstrap.min.css')}}">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://db.onlinewebfonts.com/c/061b39e95e1a0bd25e8d294af8596b2a?family=Font+Awesome+5+Free" rel="stylesheet" type="text/css"/>

  <link rel="stylesheet" href="{{ asset('themes/purposeTheme/assets/libs/animate.css/animate.min.css') }}">
  <link rel="stylesheet"
  href="{{ asset('themes/purposeTheme/assets/libs/%40fortawesome/fontawesome-pro/css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="{{ asset('temp/home/bootstrap.css')}}" type="text/css">
  <link href="{{ asset('temp/home/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{ asset('temp/home/responsive.dataTables.min.css')}}" rel="stylesheet">

  {{-- <link href="{{ asset('temp/home/jquery-jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{ asset('temp/home/dark_blue_adminux.css')}}" type="text/css">
  <link rel="stylesheet" href="{{ asset('temp/home/margin.css')}}" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}


<!-- g-hide -->
<style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
<style type="text/css">body {position: static !important; top:0px !important;}</style>
<!-- end-g-hide -->



  <style>
  .notification-container {
    position: relative;
    display: inline-block;
}

.notification-bell {
    font-size: 24px;
    color: black; /* Ensures bell is visible */
    cursor: pointer;
    position: relative;
}

.notification-bell .notification-count {
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 3px 7px;
    border-radius: 50%;
    position: absolute;
    top: -5px;
    right: -10px;
}

.notification-dropdown {
    display: none;
    position: absolute;
    top: 40px;
    right: 0;
    background: #fff; /* White background */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Stronger shadow for visibility */
    border-radius: 5px;
    width: 320px;
    padding: 15px;
    z-index: 1000;
    border: 1px solid #ddd;
}

.notification-dropdown h4 {
    margin: 0;
    padding-bottom: 8px;
    border-bottom: 1px solid #ccc;
    color: #333; /* Dark text for visibility */
    font-size: 16px;
}

.notification-dropdown p {
    font-size: 14px;
    padding: 10px 0;
    color: #222; /* Darker text */
    line-height: 1.6;
    text-align: left;
}

/* Show dropdown when bell is clicked */
.notification-container:hover .notification-dropdown {
    display: block;
}

  .ncard {
    box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
    margin: 0.5px;
    padding: 15px
  }
  input[type=number],input[type=text],input[type=email],input[type=file],textarea{
    border: 1px solid grey;
  }
  select{
    border: 2px solid grey;
  }
  a{
    text-decoration: none;
  }

  .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

.btn-success {
    background-color: #5D99E6 !important; /* Change to your desired color */
    border-color: #5D99E6 !important; /* Adjust border color */
}

.btn-success:hover {
    background-color: #5D99E6 !important;
    border-color: #5D99E6 !important;
}

.btn-primary {
    background-color: #5D99E6 !important; /* Change to your desired color */
    border-color: #5D99E6 !important; /* Adjust border color */
}

.btn-primary:hover {
    background-color: #5D99E6 !important;
    border-color: #5D99E6 !important;
}

.btn-outline-light {
    margin-right: 6px; /* Adds space to the right of each button */
     /* Adds space below each button */
}

</style>
</head>





<body class="menuclose-right menuclose" style="position: relative; min-height: 100%; top: 0px;">



  <header class="navbar-fixed">
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-faded">
      <div class="sidebar-left"> <a class="navbar-brand imglogo" href="#"><img style="width:110%; height:90%;" src="{{ asset('storage/app/public/' . $settings->logo) }}" ></a>
        <button class="btn btn-link icon-header mr-sm-2 pull-right menu-collapse"><span class="fa fa-bars"></span></button>
      </div>

      <div class="d-flex mr-auto"> &nbsp;</div>
      <ul class="navbar-nav content-right">
        @if ($settings->enable_kyc == 'yes')
                    <li class="align-self-center">
                        @if (Auth::user()->account_verify == 'Verified')
                            <a class="nav-link nav-link-icon" href="#">
                                <i class="fas fa-user-check"></i>
                                <strong style="font-size:15px;">Verified</strong>
                            </a>
                        @else
                            <a class="nav-link nav-link-icon" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                                <strong style="font-size:15px;">KYC</strong>
                            </a>
                            <div class="p-0 dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow">
                                <div class="p-2">
                                    <h5 class="mb-0 heading h6">KYC Verification</h5>
                                </div>
                                <div class="pb-2 mt-0 text-center list-group list-group-flush">
                                    @if (Auth::user()->account_verify == 'Under review')
                                        Your Submission is under review
                                    @else
                                        <div class="">
                                            <a href="{{ route('account.verify') }}"
                                                class="btn btn-primary btn-sm">Verify
                                                Account </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </li>
                @endif
        <li class="align-self-center">
          <!-- hidden-md-down -->
        {{-- langauage --}}
        </li>
      
  @if (!empty(Auth::user()->notify))
        <div class="notification-container">
    <div class="notification-bell" id="notificationBell">
        <i class="fa fa-bell"></i>
        <span class="notification-count" id="notificationCount">1</span>
    </div>
    <div class="notification-dropdown" id="notificationDropdown">
        <h4>Notification</h4>
        <p id="notificationMessage">
           {{Auth::user()->notify}}
        </p>
    </div>
</div>
@endif
        <li class="v-devider"></li>
                <li class="v-devider"></li>
        <li class="nav-item"> <a class="btn btn-link icon-header menu-collapse-right" href="#"><span class="fa fa-podcast"></span> </a> </li>
      </ul>
      <div class="sidebar-right pull-right ">
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item">
            <button class="btn-link btn userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="userpic">
                <img src="{{ asset('storage/app/public/photos/' . Auth::user()->profile_photo_path) }}" alt="user pic"></span> <span class="text">{{ Auth::user()->name }}</span></button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a>
              <a class="dropdown-item" href="{{ url('dashboard/deposits') }}"><i class="fa fa-dollar-sign"></i> Deposit</a>
              <a class="dropdown-item" href="{{ route('withdrawalsdeposits') }}"><i class="fa fa-chart-bar"></i> Withdraw</a>
              <a class="dropdown-item" href="{{ route('accounthistory') }}"><i class="fa fa-exchange"></i> Transactions</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    Logout
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
            </form>
            </div>
          </li>
          <li>    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <span class="fa fa-sign-out" style="color: white;"></span>
                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form></a></li>
        </ul>
      </div>
    </nav>
  </header>


  <div class="sidebar-left">
    <div class="user-menu-items">
      <div class="list-unstyled btn-group">
        <button class="media btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <br>
        <span class="message_userpic"><img class="d-flex" src="{{ asset('storage/app/public/photos/' . Auth::user()->profile_photo_path) }}" alt="Generic user image"></span>
          <span class="media-body"> <span class="mt-0 mb-1">{{ Auth::user()->name }}</span>
            <small> {{ Auth::user()->account_verify=="Verified" ? 'Verified' : 'Not Verified' }}</small> </span> </button>
      </div>
    </div>
    <br>
    <ul class="nav flex-column in" id="side-menu">
      <li class=" nav-item"><a href="{{ url('dashboard') }}" class="nav-link "><i class="fa fa-tachometer"></i> Account</a>
      </li>
      <li class=" nav-item"><a href="{{ url('dashboard/deposits') }}" class="nav-link "><i class="fa fa-dollar-sign"></i> Deposit</a>
      </li>
      <li class=" nav-item"><a href="{{ route('withdrawalsdeposits') }}" class="nav-link "><i class="fas fa-wallet"></i> Withdraw</a>
      </li>

      <li class=" nav-item"><a href="{{ route('trade') }}" class="nav-link "><i class="fa fa-chevron-right"></i>Trade</a>
      </li>

      <li class=" nav-item"><a href="{{ route('copyTrading') }}" class="nav-link "><i class="fa fa-copy"></i>Copy Experts</a></li>
      <li class=" nav-item"><a href="{{ route('mplans') }}" class="nav-link "><i class="fas fa-briefcase"></i> Buy Plan</a>
      </li>
      <li class=" nav-item"><a href="{{ route('nft.gallery') }}" class="nav-link "><i class="fas fa-gem"></i> NFTS</a></li>
      <li class=" nav-item"><a href="{{ route('user.signal.index') }}" class="nav-link "><i class="fa fa-signal"></i> Signal</a></li>
      <li class=" nav-item"><a href="{{ route('loans.create') }}" class="nav-link "><i class="fas fa-hand-holding-usd"></i> Loan</a></li>
      <li class=" nav-item"><a href="{{ route('tradinghistory') }}" class="nav-link "><i class="fas fa-history"></i> History</a>
      </li> @if ($settings->enable_kyc == 'yes')
 @if (Auth::user()->account_verify != 'Verified')
<li class=" nav-item"><a href="{{ route('account.verify') }}" class="nav-link "><i class="fas fa-briefcase"></i> KYC/AML</a>
      </li>
    @endif
  @endif
      <li class=" nav-item"><a href="{{ route('accounthistory') }}" class="nav-link "><i class="fas fa-money-bill-transfer"></i> Transactions</a>
      </li>
      {{--<li class=" nav-item"><a href="trading" class="nav-link "><i class="fa fa-chart-bar"></i> Place Trade</a>
      </li>--}}



      </li>
      <li class=" nav-item"><a href="{{ url('dashboard/news') }}" class="nav-link "><i class="fa fa-newspaper"></i>News </a>
      </li>
      <li class=" nav-item"><a href="{{ route('profile') }}" class="nav-link "><i class="fa fa-cogs"></i>Account Settings </a>
      </li>


      <li class=" nav-item"><a href="{{ route('referuser') }}" class="nav-link  {{ request()->routeIs('referuser') ? 'active' : '' }}" ><i class="fas fa-retweet fa"></i>Referrals </a>
      </li>
      <li class=" nav-item"><a href="{{ route('logout') }}" class="nav-link "  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout
      
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
            </form>
      </a>
      </li>
      <li class="title-nav">
      <li class="nav-item "> <a href="javascript:void(0)" class="menudropdown nav-link">Live Analysis<i class="fa fa-angle-down "></i></a>
      <ul class="nav flex-column nav-second-level ">
          <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/technical') }}"><i class="fa fa-arrows-alt"></i> Technical Analysis</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/chart') }}"><i class="fa fa-chart-area"></i> Live Market Chart</a>
          <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/calendar') }}"><i class="fa fa-calendar-alt"></i> Market Calendar</a>
          </li>
        </ul>
        <!-- /.nav-second-level -->
      </li>
      </li>
    </ul>



    <hr>
    <ul class="nav flex-column in">
      <li class="nav-item "><a href="#" class="nav-link"><span><span class="dynamicsparkline2"><canvas width="201" height="60" style="display: inline-block; width: 201px; height: 60px; vertical-align: top;"></canvas></span>
          </span></a></li>

    </ul>
    <hr>
    <br>
    <br>

  </div>

  @yield('content')


<!-- Add the language switcher -->
@include('layouts.lang')

<footer class="footer-content ">
  <div class="container ">
    <div class="row align-items-center justify-content-between">
      <div class="col-md-16 col-lg-8 col-xl-8">Copyright 2025  <a href="#" target="_blank" class="">{{$settings->site_name}}</a></div>
    </div>
  </div>
</footer>
</div><style>.tradingview-widget-copyright {font-size: 13px !important; line-height: 32px !important; text-align: center !important; vertical-align: middle !important; font-family: -apple-system, BlinkMacSystemFont,   Roboto, Ubuntu, sans-serif !important; color: #9db2bd !important;} .tradingview-widget-copyright .blue-text {color: #2962FF !important;} .tradingview-widget-copyright a {text-decoration: none !important; color: #9db2bd !important;} .tradingview-widget-copyright a:visited {color: #9db2bd !important;} .tradingview-widget-copyright a:hover .blue-text {color: #1E53E5 !important;} .tradingview-widget-copyright a:active .blue-text {color: #1848CC !important;} .tradingview-widget-copyright a:visited .blue-text {color: #2962FF !important;}</style>



<!-- Modal Start-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body"> ... </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal dark_bg fade" id="bitcoin_dpa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ncard">
      <div class="modal-body">
        <div class="form-group" align="center">
          <label for="recipient-name" class="form-control-label font-weight-bold">Scan Ethereum QR Code to copy wallet address</label>
          <hr>
          <img src="#" style="width:200px;">
          <hr style="color:white">
          <div class="input-group mb-3" style="width:80%">
            <input style="color:black" id="myInputa" type="text" value="0x6a03452eB73A8b12c202F03622ae19bec0b75C1A" class="form-control" readonly="" field_signature="2995117598" form_signature="15111468462514948206" visibility_annotation="false">
            <div class="input-group-append">
              <button type="button" onclick="copyWalleta()" class="btn btn-success" value="Copy Wallet">Copy Wallet</button>
            </div>
          </div>
        </div>
      </div>
      <form action="#account" method="POST" enctype="multipart/form-data" form_signature="14518198629138701334">
        <div class="form-group" style="border: 0px solid grey;border-radius:5px;padding:15px;">
          <span class="form-control-label font-weight-bold text-center" style="color:#17a2b8;font-size:12px">
            If your payment was successful, Please upload payment proof below.
          </span>
          <hr>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="upload" class="input-group-text">
                Upload
              </label>
            </div>
            <input type="file" name="file" class="form-control" id="upload" required="">
            <input type="hidden" value="" name="deposit_name">
            <input type="hidden" value="" name="deposit_type">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="amount" class="input-group-text">
                Amount : {{$settings->currency}}             </label>
            </div>
            <input type="number" name="amount" step="0.01" class="form-control" min="100" id="amount" placeholder="0" required="" field_signature="498263276" form_signature="14518198629138701334" visibility_annotation="false">
          </div>
          <hr>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="paida" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script src="{{ asset('temp/home/jquery-2.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/popper.min.js')}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="{{ asset('temp/home/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/ie10-viewport-bug-workaround.js')}}"></script>
<script src="{{ asset('temp/home/circle-progress.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('temp/home/jquery.sparkline.min.js')}}"></script>
{{-- <script src="{{ asset('temp/home/Chart.bundle.min.js')}}" type="text/javascript"></script> --}}
<script src="{{ asset('temp/home/utils.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/jquery.spincrement.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('temp/home/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('dash/js/core/popper.min.js')}}"></script>
<script src="{{ asset('dash/js/core/bootstrap.min.js')}} "></script>
<script src="{{ asset('temp/home/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('temp/home/adminux.js')}}" type="text/javascript"></script>
<script src="{{ asset('temp/home/dashboard1.js')}}"></script>
<script src="{{ asset('temp/home/print.js')}}"></script>


<!-- TradingView Widget END -->

<!-- <br>
    <br>

  </div> -->

<style>
.mgm {
    border-radius: 7px;
    position: fixed;
    z-index: 90;
    bottom: 80px;
    right: 50px;
    background: #fff;
    padding: 10px 27px;
    box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
}

.mgm a {
    font-weight: 700;
    display: block;
    color: #0080db;
}

.mgm a,
.mgm a:active {
    transition: all .2s ease;
    color: #0080db;
}
</style>
<div class="mgm" style="display: none;">
  <div class="txt" style="color:black;"></div>
  </div>


  <script data-cfasync="false" src="#"></script>
  <script type="text/javascript">
  var listCountries = ['South Africa', 'USA', 'Germany', 'France', 'Italy', 'Turkey', 'Australia', 'Brazil', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'China', 'Mexico', 'Venezuela', 'USA', 'Sweden', 'Italy', 'South Africa', 'Italy', 'USA', 'United Kingdom', 'Italy', 'Greece', 'Cuba', 'USA', 'Portugal', 'Austria', 'Spain', 'Panama', 'South Africa', 'China', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
  var listPlans = ['$51,000', '$14,500', '$40,000', '$41,000', '$10,000', '$50,000', '$52,300', '$9,700', '$10,000', '$4,500', '$9,500', '$34,000', '$42,000', '$4,600', '$3,700', '$27,500','$58,623','$31,600'];
  var transarray = ['just <b>invested</b>', 'has <b>withdrawn</b>', 'is <b>trading with</b>'];

  /*var listCountries = ['UK', 'UK', 'Germany', 'France', 'Italy', 'UK', 'South Africa', 'UK', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'UK', 'UK', 'UK', 'UK', 'Sweden', 'South Africa', 'UK', 'Italy', 'UK', 'United Kingdom', 'UK', 'Greece', 'Cuba', 'UK', 'Portugal', 'Austria', 'South Africa', 'Panama', 'UK', 'UK', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
  var listPlans = ['£51,000', '£14,500', '£40,000', '£41,000', '£10,000', '£50,000', '£52,300', '£9,700', '£10,000', '£4,500', '£9,500', '£34,000', '£42,000', '£4,600', '£3,700', '£27,500','£58,623','£31,600'];
  var transarray = ['just <b>invested</b>', 'has <b>withdrawn</b>', 'is <b>trading with</b>'];*/
  interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
      var run = setInterval(request, interval);

      function request() {
          clearInterval(run);
          interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
          var country = listCountries[Math.floor(Math.random() * listCountries.length)];
          var transtype = transarray[Math.floor(Math.random() * transarray.length)];
          var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
          var msg = 'Someone from <b>' + country + '</b> ' + transtype + ' <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + '</a>';
          $(".mgm .txt").html(msg);
          $(".mgm").stop(true).fadeIn(300);
          window.setTimeout(function() {
              $(".mgm").stop(true).fadeOut(300);
          }, 10000);
          run = setInterval(request, interval);
      }
  </script>


  <script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            let alert = document.querySelector('.alert-dismissible');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

@foreach ($dmethods as $item)
    <div class="modal dark_bg fade" id="deposit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content ncard">
      <div class="modal-body">
        <div class="form-group" align="center">
          <label for="recipient-name" class="form-control-label font-weight-bold">Scan {{ $item['name'] }} QR Code to copy wallet address</label>
          <hr>
					<img src=" https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $item['wallet_address'] }}">
          <img src="" style="width:200px;">
          <hr style="color:white">
          <div class="input-group mb-3" style="width:80%">
            <input style="color:black" id="wallet-address-{{ $item['id'] }}" type="text" value="{{ $item['wallet_address'] }}" class="form-control" readonly="" field_signature="303166296" form_signature="15111468462514948206" visibility_annotation="false">
            <div class="input-group-append">
              <button type="button" onclick="copyWallet{{ $item['id'] }}()" class="btn btn-success" value="Copy Wallet">Copy Wallet</button>
            </div>
          </div>
        </div>
      </div>
      <form action="{{route('savedeposit')}}" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="border: 0px solid grey;border-radius:5px;padding:15px;">
          <span class="form-control-label font-weight-bold text-center" style="color:#17a2b8;font-size:12px">
            If your payment was successful, Please upload payment proof below.
          </span>
          <hr>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="upload" class="input-group-text">
                Upload
              </label>
            </div>
            <input type="file" name="proof" class="form-control" id="upload" required="">
            <input type="hidden" name="paymethd_method"
            value="{{ $item->name }}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="amount" class="input-group-text">
                Amount : $              </label>
            </div>
            <input type="number" name="amount" step="0.01" class="form-control" min="100" id="amount" placeholder="0" required="" field_signature="498263276" form_signature="14518198629138701334" visibility_annotation="false">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="mode" value="{{ $item['name'] }}">
          </div>
          <hr>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="paid" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

 <script>
          function copyWallet{{ $item['id'] }}(){
        var copyText = document.getElementById("wallet-address-{{ $item['id'] }}");
        var newText = copyText.value;
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Address Copied',
            text: newText,
            showConfirmButton: false,
            timer: 1500
        });
    }
    </script>

@endforeach







<div class="modal dark_bg fade" id="order_deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="{{route('otherpayment')}}">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Full Name:</label>
            <input type="text" name="name" style="color:black" value="{{ Auth::user()->name }}" class="form-control" id="recipient-name" readonly="" field_signature="3489289364" form_signature="4001588096008552691" visibility_annotation="false">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Email:</label>
            <input type="email" name="email" style="color:black" value="{{ Auth::user()->email}}" class="form-control" id="recipient-name" readonly="" field_signature="1029417091" form_signature="4001588096008552691" visibility_annotation="false">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Account Type:</label>
            <select name="mode" style="border:1px solid grey" class="form-control" id="recipient-name" required="" field_signature="2771730717" form_signature="4001588096008552691" visibility_annotation="false">
              <option value="" selected="" disabled="">Deposit Type</option>
              <!-- <option value="Ethereum">Ethereum</option> -->
              <option value="Litecoin">Litecoin</option>
              <option value="BANK TRANSFER">BANK TRANSFER</option>
                  <option value="LITCOIN">LITCOIN</option>
                  <option value="BITCOIN CASH">BITCOIN CASH</option>
                  <option value="USDT">USDT</option>
                  <option value="PAYPAL">PAYPAL</option>
                  <option value="STELLER">STELLER</option>
                  <option value="WESTERN UNION">WESTERN UNION</option>
                  <option value="SKRILL">SKRILL</option>
                  <option value="MONEY GRAM">MONEY GRAM</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" id="recipient-name" required="" field_signature="498263276" form_signature="4001588096008552691" visibility_annotation="false">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="request_deposit" class="btn btn-primary">Request</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
      </div> -->
    </div>
  </div>
</div>
<!-- Modal Close -->

<script>


    function copyAddi(){
        var copyText = document.getElementById("myInputa");
        var newText = copyText.value;
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Address Copied',
            text: newText,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

<div class="modal dark_bg fade" id="mail_support" tabindex="-1" role="dialog" aria-labelledby="mailSupportLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content ncard">
            <div class="modal-body">
                <form method="POST" action="{{ route('enquiry') }}">
                    @csrf

                    <input type="hidden" name="to_email" value="{{ $settings->site_name }} Support">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}" readonly>
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}" readonly>

                    <div class="form-group">
                        <label for="subject-field" class="form-control-label">Subject:</label>
                        <input type="text" id="subject-field" name="subject" class="form-control" placeholder="Complain" required>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Message:</label>
                        <textarea id="message-text" name="message" class="form-control" rows="10" placeholder="Click here to compose message" required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="contact" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<script>
document.getElementById('asset_type').addEventListener('change', function() {
    let assetType = this.value;

    // Hide all first
    document.getElementById('trade_pair1_container').style.display = 'none';
    document.getElementById('trade_pair2_container').style.display = 'none';
    document.getElementById('trade_pair3_container').style.display = 'none';

    // Show the relevant dropdown based on selected asset type
    if (assetType === 'crypto') {
        document.getElementById('trade_pair1_container').style.display = 'block';
    } else if (assetType === 'stock') {
        document.getElementById('trade_pair2_container').style.display = 'block';
    } else if (assetType === 'forex') {
        document.getElementById('trade_pair3_container').style.display = 'block';
    }
});
</script>


@if (Session::has('success'))
<div class="modal dark_bg fade" id='successModal' tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog  col-lg-6 col-sm-4 modal-dialog-centered" role="document">
        <div class="modal-content ncard">
            <div class="modal-body">
           <p> {{ Session::get('success') }}</p>

            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeSuccessModal()">Close</button>
            </div>
        </div>
    </div>
</div>






<!-- Script to trigger modal after page load -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'), {
            keyboard: false
        });
        successModal.show();

        // Optional: Auto close after 5 seconds
        setTimeout(function() {
            successModal.hide();
        }, 15000);
    });

    function closeSuccessModal() {
        $('#successModal').modal('hide'); // Bootstrap 4 syntax

    }
</script>
@endif





@if (Session::has('message'))



<div class="modal dark_bg fade" id='errorModal' tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog  col-lg-6 col-sm-4 modal-dialog-centered" role="document">
        <div class="modal-content ncard">
            <div class="modal-body">
           <p class='text-white'>  {{ Session::get('message') }}</p>

            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeErrorModal()">Close</button>
            </div>
        </div>
    </div>
</div>






<!-- Script to trigger modal after page load -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
            keyboard: false
        });
        errorModal.show();

        // Optional: Auto close after 5 seconds
        setTimeout(function() {
            errorModal.hide();
        }, 3000);
    });

    function closeErrorModal() {


        $('#errorModal').modal('hide'); // Bootstrap 4 syntax


    }
</script>
@yield('scripts')

@endif

@include('layouts.livechat')
    </body>
    </html>

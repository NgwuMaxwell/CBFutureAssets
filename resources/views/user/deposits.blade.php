@extends('layouts.dash1')
@section('title', $title)
@section('content')
    <!-- Page title -->


    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

    <x-danger-alert />
    <x-success-alert />
       <x-success-alert />
    <x-alert />

  <title> {{ Auth::user()->name }} | {{$title}} </title>

  <div class="d-flex align-items-center p-3 bg-dark text-white rounded shadow">
    <i class="fas fa-user-circle fa-2x me-3"></i> <!-- User Icon -->
    <p class="mb-0 fs-5"><b>Username:</b> {{ Auth::user()->name }}</p>
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
      <a href="{{ url('dashboard') }}"><button class="btn btn-success btn-outline-light"><span class="">Account</span> <span class="text"><i class="fa fa-tachometer"></i></span></button></a>
      <a href="{{ route('deposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="{{ route('withdrawalsdeposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="{{ route('profile') }}"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>
<hr>



<div class="row">
  <div class="col-sm-16 col-md-8">
    <div class="card">
      <div class="card-header align-items-start justify-content-between flex">
        <h4 class="pull-left">Deposit Using Bitcoin/Ethereum</h4>
        <ul class="nav nav-pills card-header-pills pull-right">
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round" data-toggle="collapse" data-target="#btc_deposit"><i class="fa fa-chevron-down"></i></button>
          </li>
        </ul>
      </div>
      <div class="card-body" id="btc_deposit">

        @foreach ($dmethods as $item)
    <div class="ncard small">
        <h6>{{ $item['name'] }} Deposit Method</h6>
        <hr>
        <b>
            <span style="color:gold"> Please make sure you upload your payment proof for quick payment verification</span><br>
            <span style="color:#17a2b8 !important">On confirmation, our system will automatically convert your {{ $item['name'] }} to live value of Dollars. Ensure
                that you deposit the actual {{ $item['name'] }} to the address specified on the payment Page.
            </span>
        </b>
        <br>
        <hr>

        <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#deposit-{{ $item['id'] }}"> Make Deposit </button>
        <br><br>
    </div>


@endforeach

        <!--<div class="ncard small">-->
        <!--  <h6>Tether(USDT) Deposit Method</h6>-->
        <!--  <hr>-->
        <!--  <b>-->
        <!--    <span style="color:gold"> Please make sure you upload your payment proof for quick payment verification</span><br>-->
        <!--    <span style="color:#17a2b8 !important">On confirmation, our system will automatically convert your BTC or ETH to live value of POUND. Ensure-->
        <!--      that you deposit the actual Bitcoin to the address specified on the payment Page.-->
        <!--    </span>-->
        <!--  </b>-->
        <!--  <br>-->
        <!--  <hr>-->
        <!--  <button type="button" style="float:left" class="btn btn-primary" data-toggle="modal" data-target="#bitcoin_dpa"> Make Ethereum Deposit </button>-->
        <!--  <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#bitcoin_dp"> Make Bitcoin Deposit </button>-->
        <!--  <br><br>-->
        <!--</div>-->
      </div>
    </div>
  </div>
  <div class="col-sm-16 col-md-8">
    <div class="card">
      <div class="card-header align-items-start justify-content-between flex">
        <h4 class="pull-left">Other Deposit Options</h4>
        <ul class="nav nav-pills card-header-pills pull-right">
          <li class="nav-item">
            <button class="btn btn-sm btn-link btn-round" data-toggle="collapse" data-target="#order_depo"><i class="fa fa-chevron-down"></i></button>
          </li>
        </ul>
      </div>
      <div class="card-body" id="order_depo">
        <div class="ncard small">
          <h6>Request other available Deposit Method</h6>
          <hr>
          <b>
            <span style="color:gold"> Once payment is made using this method you are to send your payment
              proof to our support mail <a href="#">{{$settings->contact_email}}</a></span><br>
            <span style="color:#17a2b8 !important">Once requested, you will receive the payment details via our support mail....
            </span>
          </b>
          <br>
          <hr>
          <button type="button" style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#order_deposit"> Processed</button>
          <br><br>
        </div>
      </div>
    </div>
  </div>
</div>



<br><br>


</div>
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

@endsection

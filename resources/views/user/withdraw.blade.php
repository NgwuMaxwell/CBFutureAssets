@extends('layouts.dash1')
@section('title', $title)
@section('content')
<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> {{ Auth::user()->name }} | {{$title}} </title>

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
      <a href="{{ url('dashboard') }}"><button class="btn btn-success btn-outline-light"><span class="">Account</span> <span class="text"><i class="fa fa-tachometer"></i></span></button></a>
      <a href="{{ route('deposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="{{ route('withdrawalsdeposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="{{ route('profile') }}"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>

<hr>

<x-danger-alert />
<x-success-alert />





<div class="card" id="hip">
    <div class="card-header">
        <h5 class="font-weight-bold">
            <span style="float:left">Withdrawal notice</span>
            <span style="float:right;font-size:15px">Balance : <span style="color:green">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</span></span>
        </h5>
    </div>
    <div class="card-body">
        <div class="container_wizard wizard-bordered">
            <div class="row">



            <div class=""
            style="width:100%; max-width: 100%; background-color: #262b3e; border-radius: 10px; color: #fff; padding: 10px; font-size: 14px; margin-bottom: 10px">
                <div class="">
                    <p style="color: #fff; font-size: 18px">Withdrawal Request Submitted</p>
                    <br>
                    <p style="color: #fff;">Your withdrawal request has been successfully submitted and is being processed.</p>
                    <progress style="width: 100%" value="100" max="100" />
                </div>
            </div>

<div class="">



						<div class="list-group">

  <p class="list-group-
  item"  >



      <strong>Important Notice: </strong>

      Your withdrawal request has been successfully submitted! Please wait while we process your request. You will receive a notification once your withdrawal has been completed.

</p>


						<a href="{{ route('withdrawalsdeposits') }}" class="btn btn-warning btn-lg" style="width: 100%; max-width: 200px;">Return to Withdrawals</a>
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
@endsection

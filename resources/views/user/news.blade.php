@extends('layouts.dash1')
@section('title', $title)
@section('content')


<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> {{ Auth::user()->name }} | {{$title}}</title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>NEWS UPDATE</b> </p></div>
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
      <a href="{{ url('dashboard/deposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Make Deposit</span> <span class="text"><i class="fa fa-dollar-sign"></i></span></button></a>
      <a href="{{ route('withdrawalsdeposits') }}"><button class="btn btn-success btn-outline-light"><span class="">Withdraw Funds</span> <span class="text"><i class="fa fa-chart-bar"></i></span></button></a>
      <button class="btn btn-success btn-outline-light" data-toggle="modal" data-target="#mail_support"><span class="">Mail Us</span> <span class="text"><i class="fa fa-envelope"></i></span></button>
      <a href="{{ route('profile') }}"><button class="btn btn-danger btn-outline-danger"><span class="">Settings</span> <i class="fa fa-cog fa-spin ml-2"></i></button></a>
    </div>
  </div>
</div>
<hr>



<div class="row">
    <div class="col-sm-16 col-md-16">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title"><i class="fa fa-newspaper"></i> Top News </h6>
            </div>
            <div class="card-body">
                <div class="notes notes-primary" role="" style="background-color:white;margin:0 -4px;margin-right:0px;">
                    <strong style="font-size:13px;color:black;background-color:white;margin:0 -10px;margin-right:0px">Company News</strong><br>
                    <span style="font-size:12px;color:black;background-color:white;margin:0 0px;margin-right:0px">
                    ....
                    </span>
                </div>
				<script type="text/javascript">
                    DukascopyApplet = {
                        "type": "online_news",
                        "params": {
                            "header": false,
                            "borders": false,
                            "defaultLanguage": "en",
                            "availableLanguages": ["ar", "bg", "cs", "de", "en", "es", "fa", "fr", "he", "hu", "it", "ja", "ms", "pl", "pt", "ro", "ru", "sk", "sv", "th", "uk", "zh"],
                            "newsCategories": ["finance", "forex", "stocks", "company_news", "commodities"],
                            "width": "100%",
                            "height": "500",
                            "adv": "popup"
                        }
                    };
                </script>
                <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                </div>
        </div>
    </div>
</div>
<br><br>


</div>
@endsection

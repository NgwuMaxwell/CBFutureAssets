@extends('layouts.dash1')
@section('title', $title)
@section('content')
    <!-- Page title -->


    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

    <x-danger-alert />
    <x-success-alert />


  <title> {{ Auth::user()->name }} | {{$title}} </title>
  <div class="d-flex align-items-center p-3 bg-opacity-25 bg-dark rounded shadow-sm">
    <i class="fas fa-user-circle fa-2x text-white me-3"></i> <!-- User Icon -->
    <p class="mb-0 text-white fs-5"><b>Username:</b> {{ Auth::user()->name }}</p>
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
        <a href="{{ route('user.signal.plans') }}" class="btn btn-success mx-4  my-2">Signal Plans</a>
        <a href="{{ route('user.signal.plans') }}" class="btn btn-success mx-4  my-2">Signals</a>

    </div>
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
    <div class="container">

        <div class="card ">
            <div class="card-body">






                    <div class="container">
                        <h2 class="text-center">My Signal Subscriptions</h2>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($subscriptions->isEmpty())
                            <p class="text-center text-muted">You have no active subscriptions.</p>
                        @else
                            <table class="table table-bordered">
                                <thead class="thead-light text-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Plan Name</th>
                                        <th>Price</th>
                                        <th>Expires At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscriptions as $key => $subscription)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subscription->plan->name }}</td>
                                        <td>${{ number_format($subscription->plan->price, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($subscription->expires_at)->toDayDateTimeString() }}</td>
                                        {{-- <td>{{ \Carbon\Carbon::parse($subscription->expires_at)->format('Y-m-d') }}</td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>








                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    @endsection

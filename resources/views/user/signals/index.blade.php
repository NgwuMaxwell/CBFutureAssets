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
    <div class="btn-group pull-left">
        <a href="{{ route('user.signal.plans') }}" class="btn btn-success mx-4  my-2">Signal Plans</a>
        <a href="{{ route('user.signal.subscriptions') }}" class="btn btn-success mx-4  my-2">My Signal Plans</a>

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
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Trading Signals</h2>

                @if(session('message'))
                    <div class="alert alert-danger">{{ session('message') }}</div>
                @endif

                @if($signals->isEmpty())
                    <p class="text-center text-muted">No signals available.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Signal Name</th>
                                    <th>Entry Price</th>
                                    <th>Take Profit</th>
                                    <th>Stop Loss</th>
                                    <th>Leverage</th>
                                     <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($signals as $key => $signal)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $signal->name }}</td>
                                    <td>{{$settings->currency}}{{ number_format($signal->entry_price, 2) }}</td>
                                    <td>{{$settings->currency}}{{ number_format($signal->take_profit, 2) }}</td>
                                    <td>{{$settings->currency}}{{ number_format($signal->stop_loss, 2) }}</td>
                                    <td>{{ $signal->leverage }}x</td>
                                      <td>{{ $signal->status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($signal->updated_at)->toDayDateTimeString() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End table-responsive -->
                @endif
            </div> <!-- End card-body -->
        </div> <!-- End card -->
    </div> <!-- End container -->
</div> <!-- End row -->

        </div>
    </div>
    @endsection

@extends('layouts.dash1')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> {{ Auth::user()->name }} | {{$title}} </title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>TRANSACTION</b> </p></div>
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
    <div class="col-sm-16 col-md-16">
        <div class="card">
            <div class="card-header align-items-start justify-content-between flex">
                <h4 class="pull-left">Transactions</h4>
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
                                <span class="mt-2 ">Deposit</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <span class="d-block">
                                   <i class="bi bi-graph-down fs-3"></i>
                                </span>
                                <span class="mt-2 ">Withdrawal</span>
                            </a>
                        </li>
                        <li class="p-2 nav-item col-6 col-lg-3" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">
                                <span class="d-block">
                                    <i class="bi bi-hourglass fs-3"></i>
                                </span>
                                <span class="mt-2 ">Others</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="table-responsive">
                                <table id="DeposTbl" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Payment mode</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposits as $deposit)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ is_numeric($deposit->amount) ? number_format($deposit->amount, 2) : number_format(floatval($deposit->amount), 2)  }}</td>

                                                <td>{{ $deposit->payment_mode }}</td>
                                                <td>
                                                    @if ($deposit->status == 'Processed')
                                                        <span class="badge badge-success bg-success">{{ $deposit->status }}</span>
                                                    @elseif($deposit->status == 'Pending')
                                                        <span class="badge badge-danger bg-warning">{{ $deposit->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="table-responsive">
                                <table id="WithdrawTbl" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount requested</th>
                                            <th>Amount + charges</th>
                                            <th>Recieving mode</th>
                                            <th>Status</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdrawals as $withdrawal)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ $withdrawal->amount }}</td>
                                                <td>{{ $settings->currency }}{{ $withdrawal->to_deduct }}</td>
                                                <td>{{ $withdrawal->payment_mode }}</td>
                                                <td>
                                                    @if ($withdrawal->status == 'Processed')
                                                        <span class="badge badge-success bg-success">{{ $withdrawal->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger bg-warning">{{ $withdrawal->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="table-responsive">
                                <table id="OthersTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Plan/Narration</th>
                                            <th>Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($t_history as $history)
                                            <tr>
                                                <td>{{ $settings->currency }}{{ $history->amount }}</td>
                                                <td>{{ $history->type }}</td>
                                                <td>{{ $history->plan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($history->created_at)->toDayDateTimeString() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
<br><br>


</div>

@endsection

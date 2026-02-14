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
        <a href="{{ route('trade') }}" class="btn btn-success mx-4 text-white my-2">Trade Now</a>


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


                    <h2 class="text-white text-center">Trade History</h2>
                    <div id="trade-history-container">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover bg-light text-dark table-sm">
                                <thead class="thead-light text-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Asset</th>
                                        <th>Action</th>
                                        <th>Amount</th>
                                        <th>Leverage</th>
                                        <th>Take Profit</th>
                                        <th>Stop Loss</th>
                                        <th>Status</th>
                                        <th>Result</th>
                                        <th>Profit/Loss</th>
                                        <th>Opened At</th>
                                        <th>Expires At</th>
                                        <th>Time Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($trades as $trade)
                                        <tr data-trade-id="{{ $trade->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $trade->asset_name }}</td>
                                            <td class="text-uppercase">{{ ucfirst($trade->action) }}</td>
                                            <td>${{ number_format($trade->amount, 2) }}</td>
                                            <td>{{ $trade->leverage }}x</td>
                                            <td>{{ $trade->take_profit }}</td>
                                            <td>{{ $trade->stop_loss }}</td>
                                            <td class="trade-status">
                                                <span class="badge {{ $trade->status == 'open' ? 'badge-primary' : 'badge-secondary' }}">
                                                    {{ ucfirst($trade->status) }}
                                                </span>
                                            </td>
                                            <td class="trade-result">
                                                @if($trade->result == 'PENDING')
                                                    <span class="badge bg-warning text-dark">PENDING</span>
                                                @else
                                                    <span class="badge {{ $trade->result == 'WIN' ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $trade->result }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="trade-profit">
                                                @if($trade->profit_loss !== null)
                                                    <span class="{{ $trade->profit_loss >= 0 ? 'text-success' : 'text-danger' }}">
                                                        {{ $trade->profit_loss >= 0 ? '+' : '-' }}${{ number_format(abs($trade->profit_loss), 2) }}
                                                    </span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($trade->created_at)->format('Y-m-d H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($trade->expires_at)->format('Y-m-d H:i') }}</td>
                                            <td class="countdown-timer font-weight-bold text-danger" data-expiry="{{ \Carbon\Carbon::parse($trade->expires_at)->timestamp }}"></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center text-muted">No trades found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function updateCountdowns() {
                document.querySelectorAll('.countdown-timer').forEach((element) => {
                    const expiryTimestamp = parseInt(element.getAttribute('data-expiry')) * 1000;
                    const now = new Date().getTime();
                    const timeLeft = expiryTimestamp - now;

                    if (timeLeft > 0) {
                        const minutes = Math.floor(timeLeft / (1000 * 60));
                        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                        element.textContent = `${minutes}m ${seconds}s`;
                    } else {
                        element.textContent = "Expired";
                        element.classList.remove("text-danger");
                        element.classList.add("text-muted");

                        const row = element.closest('tr');
                        const tradeId = row.getAttribute('data-trade-id');

                        if (tradeId) {
                            processExpiredTrade(tradeId, row);
                        }
                    }
                });
            }

            function processExpiredTrade(tradeId, row) {
    $.ajax({
        url: "{{ route('trades.process') }}",
        type: "POST",
        data: {
            trade_id: tradeId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            console.log("✅ Trade processed successfully:", response);

            if (response.success) {
                row.querySelector('.trade-status').innerHTML = `<span class="badge bg-secondary">Closed</span>`;
                row.querySelector('.trade-result').innerHTML = `<span class="badge bg-${response.result === 'WIN' ? 'success' : 'danger'}">${response.result}</span>`;
                row.querySelector('.trade-profit').innerHTML = `<span class="${response.profit_loss >= 0 ? 'text-success' : 'text-danger'}">${response.profit_loss >= 0 ? '+' : '-'}$${Math.abs(response.profit_loss)}</span>`;

                // ✅ Fetch and update trade history dynamically
                updateTradeHistory();
            } else {
                console.error("⚠️ Trade processing failed:", response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("❌ AJAX Error:", error);
        }
    });
}

function updateTradeHistory() {
    console.log("🔄 Fetching updated trade history...");

    $.ajax({
        url: "{{ route('user.trades.history') }}",
        type: "GET",
        success: function(response) {
            $("#trade-history-container").html(response);
            console.log("✅ Trade history updated successfully!");
        },
        error: function(xhr, status, error) {
            console.error("❌ Failed to update trade history:", error);
        }
    });
}


            setInterval(updateCountdowns, 1000);
            updateCountdowns();
        </script>




    </div>








@endsection




@inject('uc', 'App\Http\Controllers\User\UsersController')
@php
    $array = \App\Models\User::all();
    $usr = Auth::user()->id;
@endphp
@extends('layouts.dash1')
@section('title', $title)
@section('content')


<div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">


  <title> {{ Auth::user()->name }} | {{$title}}</title>

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>Plan Details</b> </p></div>
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
    <div class="mt-3 row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p>
                                <a href="{{ route('myplans', 'All') }}">
                                    <i class="p-2 rounded-lg fal fa-arrow-circle-left fa-2x bg-light"></i>
                                </a>
                            </p>
                        </div>

                        <h2 class="text-black">
                            {{ $plan->dplan->name }} -
                            {{ $plan->dplan->increment_type == 'Fixed' ? $settings->currency : '' }}{{ $plan->dplan->increment_amount }}{{ $plan->dplan->increment_type == 'Percentage' ? '%' : '' }}
                            {{ $plan->dplan->increment_interval }}
                            for {{ $plan->dplan->expiration }}
                        </h2>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if ($plan->active == 'yes')
                                    <span class="badge badge-success">Active</span>
                                @elseif($plan->active == 'expired')
                                    <span class="badge badge-danger">Expired</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>
                            @if ($settings->should_cancel_plan)
                                @if ($plan->active == 'yes')
                                    <a href="#" class="px-3 btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#exampleModal"> <i class=" fas fa-times"></i> Cancel this Plan</a>

                                    <!-- cancel plan modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">cancel plan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to cancel your {{ $plan->dplan->name }} plan?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>

                                                    <a href="{{ route('cancelplan', $plan->id) }}" type="button"
                                                        class="btn btn-danger">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h4 class="mb-3">Plan information</h4>
                        <div class="mb-5 row">
                            <div class="col-12">
                                <div class="d-flex justify-content-around">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h2 class="m-0">
                                                {{ $settings->currency }}{{ number_format($plan->amount, 2, '.', ',') }} +
                                                &nbsp;
                                            </h2>
                                            <small>Invested amount</small>
                                        </div>
                                        <div>
                                            <h2 class="m-0 text-success">
                                                {{ $settings->currency }}{{ number_format($plan->profit_earned, 2, '.', ',') }}
                                            </h2>
                                            <small>Profit earned</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="m-0 text-success">
                                            @if ($settings->return_capital)
                                                {{ $settings->currency }}{{ number_format($plan->amount + $plan->profit_earned, 2, '.', ',') }}
                                            @else
                                                {{ $settings->currency }}{{ number_format($plan->profit_earned, 2, '.', ',') }}
                                            @endif


                                        </h2>
                                        <small>Total Return</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-md-3">
                                <p>Duration: <br><strong>{{ $plan->dplan->expiration }}</strong> </p>
                            </div>
                            <div class="col-md-3">
                                <p>Start Date: <br>
                                    <strong>{{ $plan->created_at->addHour()->toDayDateTimeString() }}</strong>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p>End Date:
                                    <br><strong>{{ \Carbon\Carbon::parse($plan->expire_date)->addHour()->toDayDateTimeString() }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 row border-bottom">
                            <div class="col-md-3">
                                <p>Minimum Return: <br><strong>{{ $plan->dplan->minr }}%</strong> </p>
                            </div>
                            <div class="col-md-3">
                                <p>Maximum Return: <br> <strong>{{ $plan->dplan->maxr }}%</strong> </p>
                            </div>
                            <div class="col-md-3">
                                <p>ROI Interval:
                                    <br><strong>{{ $plan->dplan->increment_interval }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 ">
                        <h4>
                            Transactions
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $history)
                                        <tr>
                                            <td>Profit</td>
                                            <td>{{ $history->created_at->addHour()->toDayDateTimeString() }}</td>
                                            <td>{{ $settings->currency }}{{ number_format($history->amount, 2, '.', ',') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3">No transaction record yet</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>





@endsection

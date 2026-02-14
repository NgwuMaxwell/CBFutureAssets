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
    <p style="color:white"> <b>My Plans</b> </p></div>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($numOfPlan > 0)
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <select name="sortplan" id="sortvalue"
                                    class="custom-select custom-select-sm form-control w-25">
                                    <option value="All">All</option>
                                    <option value="yes">Active</option>
                                    <option value="cancelled">Cancelled/Inactive</option>
                                    <option value="expired">Expired</option>
                                </select>
                                <a href="javascript:;" id="sortform" class="btn btn-primary btn-sm">Sort</a>
                            </div>
                        </div>
                    @endif

                    @forelse ($plans as $plan)
                        <div class="mt-4 row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            {{-- <span class="mr-1 mr fas fa-history fa-3x text-primary"></span> --}}
                                            <div class="">
                                                <h6 class="text-light h6">{{ $plan->dplan->name }}</h6>
                                                <p class="text-muted">Amount - <span
                                                        class="amount">{{ $settings->currency }}{{ number_format($plan->amount) }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <div class="d-flex justify-content-around">
                                                <div class="mr-3">
                                                    <h6 class="text-light bold">
                                                        {{ $plan->created_at->addHour()->toDayDateTimeString() }}</h6>
                                                    <span class="nk-iv-scheme-value date">Start Date</span>
                                                </div>
                                                <i class="fas fa-arrow-right text-muted"></i>
                                                <div class="ml-3">
                                                    <h6 class="text-light bold">
                                                        {{ \Carbon\Carbon::parse($plan->expire_date)->addHour()->toDayDateTimeString() }}
                                                    </h6>
                                                    <span class="nk-iv-scheme-value date">End Date</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <h6 class="text-light">
                                                @if ($plan->active == 'yes')
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($plan->active == 'expired')
                                                    <span class="badge badge-danger">Expired</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </h6>
                                            <span class="nk-iv-scheme-value amount">Status</span>
                                        </div>

                                        <a href="{{ route('plandetails', $plan->id) }}">
                                            <i class="fas fa-chevron-right fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="mt-4 row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="text-center card-body">

                                        <p>You do not have an investment plan at the moment or no value match your query.
                                        </p>
                                        <a href="{{ route('mplans') }}" class="px-3 btn btn-primary">Buy a plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    @if (count($plans) > 0)
                        <div class="row">
                            <div class="mt-2 col-12">
                                {{ $plans->links() }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        var sortvalue = document.getElementById('sortvalue');
        var sortform = document.getElementById('sortform');
        let makepayurl = "{{ url('/dashboard/sort-plans/All') }}";
        sortform.href = makepayurl;
        sortvalue.addEventListener('change', function() {
            makepayurl = "{{ url('/dashboard/sort-plans/') }}" + '/' + sortvalue.value;
            sortform.href = makepayurl;
        })
    </script>
    </div>
</div>
@endsection

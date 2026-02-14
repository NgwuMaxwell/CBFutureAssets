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
    <p style="color:white"> <b>Refer User</b> </p></div>
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
                    <div class="p-4 row">
                        <div class="col-md-8 offset-md-2 text-center">
                            <strong>You can refer users by sharing your referral link:</strong><br><br>
                            <div class="mb-3 input-group">
                                <input type="text" class="form-control readonly" value="{{ Auth::user()->ref_link }}"
                                    id="reflink" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" onclick="copyReferralLink()" type="button"
                                        id="button-addon2">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>

                            <strong>or your Referral ID</strong><br>
                            <h4 class="text-success"> {{ Auth::user()->username }}</h4>
                            <h5 class="title1 text-center">
                                You were referred by
                            </h5>
                            <i class="fa fa-user fa-2x d-block"></i>
                            <small>{{ $uc->getUserParent($usr) }}</small>
                        </div>
                        <div class="mt-4 col-md-12">
                            <h6 class="text-left title1">Your Referrals.</h6>
                            <div class="table-responsive">
                                <table class="table UserTable table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Client name</th>
                                            <th>Ref. level</th>
                                            <th>Parent</th>
                                            <th>Client status</th>
                                            <th>Date registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {!! $uc->getdownlines($array, $usr) !!}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function copyReferralLink() {
        let copyText = document.getElementById("reflink");

        // Select the text
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text
        document.execCommand("copy");

        // Show SweetAlert2 success message
        Swal.fire({
            title: "Copied!",
            text: "Referral link copied to clipboard.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
    }
</script>



@endsection

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

<div class="row  align-items-center justify-content-between" style="margin-top:10px">
  <div class="col-16 col-sm-16">
    <p style="color:white"> <b>Username :</b> {{ Auth::user()->name }} </p></div>
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
        <div class="col-md-16">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="col-lg-12 offset-lg-2 col-sm-12">
                            <div class="p-3 text-center">
                                <h2 class="">Begin your ID-Verification</h2>
                                <p>To comply with regulation each participant will have to go through indentity verification
                                    (KYC/AML) to prevent fraud causes.</p>
                            </div>
                            <div class="p-2 shadow-lg">
                                <div class="p-4 row">
                                    <form action="{{ route('kycsubmit') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                    <div>

                                        <div class="pt-3 mt-3 col-12 border-bottom border-top">
                                            <h5>Document Upload</h5>
                                            <p>Your simple personal document required for identification</p>
                                        </div>
                                        <div class="mt-4 col-16">
                                            <div class="row">
                                                <div class="mb-2 col-md-16">
                                                    <div class="flex-wrap btn-group-toggle d-flex justify-content-around"
                                                        data-toggle="buttons">
                                                        <label class="mb-2 mx-1 shadow-sm btn btn-primary active">
                                                            <i class="fas fa-atlas"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Int'l Passport" autocomplete="off" checked> Int'l
                                                            Passport
                                                        </label>
                                                        <label class="mb-2 mx-1 shadow-sm btn btn-primary">
                                                            <i class="fas fa-flag"></i>
                                                            <input type="radio" name="document_type" value="National ID"
                                                                autocomplete="off"> National ID
                                                        </label>
                                                        <label class="mb-2 shadow-sm btn btn-primary">
                                                            <i class="fas fa-address-card"></i>
                                                            <input type="radio" name="document_type"
                                                                value="Drivers License" autocomplete="off"> Drivers
                                                            License
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">
                                                        <h6 class=" font-weight-bold">To avoid delays when verifying
                                                            account, Please make sure your document meets the criteria
                                                            below:</h6>
                                                        <ul class=" list-group">
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Chosen credential must not have expired.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Document should be in good condition and clearly visible.
                                                            </li>
                                                            <li>
                                                                <i class="fas fa-check-square text-primary"></i>
                                                                Make sure that there is no light glare on the document.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="mt-3 text-black h6">Upload front side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="frontimg"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-id-card fa-6x"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="mt-3 text-black h6">Upload back side <span
                                                            class="text-danger">*</span></p>
                                                    <div class="mt-3 align-items-center justify-content-around d-md-flex">
                                                        <div class="p-2 border p-md-5 ">
                                                            <div class="custom-file">
                                                                <input type="file" name="backimg" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <i class="fas fa-credit-card-blank fa-6x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-12">
                                            <div class="mb-2 form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="defaultCheck1" required>
                                                <h5 class="form-check-label" for="defaultCheck1">
                                                    All The Information I Have Entered Is Correct.
                                                </h5>
                                            </div>
                                            @if (Auth::user()->account_verify == 'Under review')
                                                <button type="submit" class="px-4 btn btn-primary d-block"
                                                    disabled>Submit Application</button>
                                                <small class="text-success">Your previous application is under review,
                                                    please wait</small>
                                            @else
                                                <button type="submit" class="px-4 btn btn-primary">Submit
                                                    Application</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection

@extends('layouts.dash1')
@section('title', $title)
@section('content')
    <!-- Page title -->


    <div class="wrapper-content">
    <!-- <div class="container" style="max-width:1300px"> -->
    <div class="container" style="max-width:1400px">

 
<div > <!-- Keeps space for alerts -->
    <x-danger-alert />
    <x-success-alert />
       <x-error-alert />
</div>


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
<div class="container py-5">
    <h2>My NFTs</h2>

    @if($nfts->isEmpty())
        <p>You have not purchased or created any NFTs yet.</p>
    @else
        <div class="row">
            @foreach ($nfts as $nft)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/app/public/' . $nft->image) }}" class="card-img-top">
                        <div class="card-body">
                            <h5>{{ $nft->name }}</h5>
                            <p>Price: {{ $nft->price }}ETH</p>
                            <p>Status: <strong>{{ ucfirst($nft->status) }}</strong></p>
                            <a href="{{ route('user.nfts.show', $nft->id) }}" class="btn btn-primary bg-lg" style="width: 100%; max-width: 200px;">View</a>


                            @if ($nft->status == 'available')
                            {{-- <a href="{{ route('nfts.edit', $nft->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('nfts.destroy', $nft->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
                        @else
                            <form action="{{ route('user.nfts.sell', $nft->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-lg my-2" style="width: 100%; max-width: 200px;">Sell</button>
                            </form>
                        @endif




                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $nfts->links() }}
        </div>
    @endif
</div>
</div>
</div>
@endsection

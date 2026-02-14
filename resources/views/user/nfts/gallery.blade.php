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
    <div class="btn-group pull-left">
        <a href="{{ route('user.nfts.create') }}" class="btn btn-success mx-4  my-2">Create NFT</a>
            <a href="{{ route('user.nfts.my') }}" class="btn btn-warning  mx-4  my-2">My NFTs</a>
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
    <div class="container py-5">
        <!-- Tab Panel -->
        <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
            <button class="btn btn-primary" onclick="filterNFTs('all')">All Categories</button>
            <!-- Dynamically generated category buttons -->
            @foreach ($categories as $category)
                <button class="btn btn-secondary  mx-4 my-2" onclick="filterNFTs('{{ $category }}')">{{ $category }}</button>
            @endforeach
            <a href="{{ route('user.nfts.create') }}" class="btn btn-success mx-4  my-2">Create NFT</a>
            <a href="{{ route('user.nfts.my') }}" class="btn btn-warning  mx-4  my-2">My NFTs</a>
        </div>
        <!-- Search Bar -->
<div class="mb-4 text-center">
    <form method="GET" action="{{ route('nft.gallery') }}">
        <input type="text" name="search" class="form-control w-50 mx-auto" placeholder="Search NFTs by name or category..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
</div>

        <!-- NFT Gallery -->
        <div class="row g-4">
            @foreach ($nfts as $nft)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="card shadow-sm">
                        <a href="{{ route('user.nfts.show', $nft->id) }}">
                            <img src="{{ asset('storage/app/public/' . $nft->image) }}" alt="{{ $nft->name }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                {{-- <img src="{{ asset('storage/app/public/photos/' . Auth::user()->profile_photo_path) }}" alt="Owner" class="rounded-circle me-2" width="30" height="30"> --}}

                                <h6 class="mb-0">{{ $nft->name }}</h6>
                            </div>
                            <p class="text-muted">Price: {{ $nft->price }}ETH</p>
                            <a href="{{ route('user.nfts.show', $nft->id) }}" class="btn btn-primary w-100">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function filterNFTs(category) {
            window.location.href = `?category=${category}`;
        }

        function searchNFTs() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let items = document.getElementsByClassName('nft-item');

            for (let i = 0; i < items.length; i++) {
                let name = items[i].querySelector("h5").innerText.toLowerCase();
                if (name.includes(input)) {
                    items[i].style.display = "block";
                } else {
                    items[i].style.display = "none";
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>
</div>


    @endsection


<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>
@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">All Bids</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">




                                <div class="container mt-4">
                                    <h2>Sold NFTs</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price (USD)</th>
                                                <th>Buyer</th>
                                                <th>Seller</th>
                                                <th>Sold On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($soldNFTs as $nft)
                                            <tr>
                                                <td><img src="{{ asset('storage/app/public/' . $nft->image) }}" width="50"></td>
                                                <td>{{ $nft->name }}</td>
                                                <td>{{ $nft->category }}</td>
                                                <td>{{ $nft->price }}ETH</td>
                                                <td>{{ $nft->user->name }}</td>
                                                <td>
                                                    @php
                                                        $seller = \App\Models\User::where('id', $nft->previous_owner_id)->first();
                                                    @endphp
                                                    {{ $seller ? $seller->name : 'Unknown' }}
                                                </td>
                                                <td>{{ $nft->updated_at->format('Y-m-d') }}</td>
                                            </tr>
                                            @endforeach
                                            <td>
                                                <a href="{{ route('admin.nfts.edit', $nft->id) }}" class="btn btn-warning">Edit</a>

                                            </td>
                                        </tbody>
                                    </table>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

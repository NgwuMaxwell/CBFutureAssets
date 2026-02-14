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





                                <div class="container">
                                    <h2 class="mb-4">Bids Awaiting Approval</h2>

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('message') }}</div>
                                    @endif

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NFT</th>
                                                <th>Bidder</th>
                                                <th>Bid Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bids as $bid)
                                                <tr>
                                                    <td>{{ $bid->nft->name }}</td>
                                                    <td>{{ $bid->user->name }}</td>
                                                    <td>{{ number_format($bid->amount, 2) }} ETH</td>
                                                    <td>
                                                        <form action="{{ route('admin.bids.approve', $bid->id) }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <button class="btn btn-success">Approve Bid</button>
                                                        </form>
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




@endsection

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
                    <h1 class="title1 ">Manage NFTS</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">




                                <div class="container">
                                    <h2>NFTs Management</h2>
                                    <a href="{{ route('admin.nfts.create') }}" class="btn btn-success">Add NFT</a>
                                    <a href="{{ route('admin.bids.index') }}" class="btn btn-primary custom-left-button">Bids</a>

                                    <a href="{{ route('admin.nfts.sold') }}" class="btn btn-primary custom-left-button">All Bought NFTS</a>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($nfts as $nft)
                                                <tr>
                                                    <td>{{ $nft->id }}</td>
                                                    <td><img src="{{ asset('storage/app/public/' . $nft->image) }}" width="50"></td>
                                                    <td>{{ $nft->name }}</td>
                                                    <td>{{ $nft->category }}</td>
                                                    <td>{{ $nft->price }}(Eth)</td>
                                                    <td>{{ $nft->status }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.nfts.edit', $nft->id) }}" class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('admin.nfts.destroy', $nft->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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



<style>
    .custom-left-button {
    margin-left: 0 !important;
}

    </style>
@endsection

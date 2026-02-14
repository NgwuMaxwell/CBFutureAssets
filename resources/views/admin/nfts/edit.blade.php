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
                    <h1 class="title1 ">Edit NFTS</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">


                                <div class="container">
                                    <h2>Edit NFT</h2>
                                    <form action="{{ route('admin.nfts.update', $nft->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $nft->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control">{{ $nft->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Price (ETH)</label>

                                            <input type="number" name="price" class="form-control"  step="0.0001" value="{{ $nft->price }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <input type="text" name="category" class="form-control" value="{{ $nft->category }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Current Image</label>
                                            <br>
                                            <img src="{{ asset('storage/app/public/' . $nft->image) }}" width="100">
                                        </div>
                                        <div class="mb-3">
                                            <label>Change Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update NFT</button>
                                    </form>
                                </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

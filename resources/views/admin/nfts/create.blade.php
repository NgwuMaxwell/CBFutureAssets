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
                    <h1 class="title1 ">Create New NFTS</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">

                                <div class="container">
                                    <h2>Add New NFT</h2>
                                    <form action="{{ route('admin.nfts.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Price (ETH)</label>

                                  <input type="number" name="price" class="form-control" step="0.0001" min="0" required>

                                        </div>
                                        <div class="mb-3">
                                            <label>Category</label>
                                            <input type="text" name="category" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Create NFT</button>
                                    </form>
                                </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

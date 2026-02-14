@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content  ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Update Copy trade Experts</h1>
                </div>
                <x-danger-alert />
                <x-success-alert />
                <x-error-alert />
                <div class="mb-5 row">

                    <div class="col-12 card shadow p-4 ">


                        <div class="container">






                            <h2>Edit Expert</h2>

                            <form action="{{ route('admin.experts.update', $expert->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $expert->name) }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Win Rate (%)</label>
                                    <input type="number" name="win_rate" value="{{ old('win_rate', $expert->win_rate) }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Profit Share Percentage (%)</label>
                                    <input type="number" name="profit_share_percentage" value="{{ old('profit_share_percentage', $expert->profit_share_percentage) }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Minimum Start-up Capital</label>
                                    <input type="number" name="min_startup_capital" value="{{ old('min_startup_capital', $expert->min_startup_capital) }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <input type="file" name="profile_picture" class="form-control">
                                    @if($expert->profile_picture)
                                        <p>Current Picture: <img src="{{ asset('storage/app/public/' . $expert->profile_picture) }}" width="100"></p>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Update Expert</button>
                            </form>










                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

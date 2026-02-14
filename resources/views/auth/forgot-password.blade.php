@extends('layouts.guest1')
@section('title', 'Forgot your password')
@section('content')


        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12 login_form rounded-start-11">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    @if (Session::has('message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ Session::get('message') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                                    <div class="card-body mt-2 mb-2">

                                        <h2 class="text-start mb-2">Forgot Password</h2>
                                        <p class="mb-3 text-muted tx-13 ms-0 text-start">Don't worry! We will help you
                                            to recover your password.</p>

                                        <center>
                                                                                    </center>

                                         <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                            <div class="form-group text-start">
                                                <label class="tx-medium">Enter the Email Address associated with your
                                                    account</label>
                                                <input class="form-control" placeholder="Enter your email" type="email"
                                                    name="email" required="" >
                                                    @error('email')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                                                       @enderror
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block"
                                                name="recover">Request reset link</button>

                                        </form>
                                        <div class="card-footer border-top-0 ps-0 mt-3 text-start mb-0 ">
                                            <p>Did you remembered your password?</p>
                                            <p class="mb-0">Try to <a href="{{route('login')}}">Sign in</a></p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 d-none d-lg-block text-center bg-primary details rounded-end-11">
                            <div class="mt-4 pt-3 p-2 pos-relative">
                                <div class="clearfix"></div>
                                <img src="{{ asset('temp/auth/main/forgot.svg')}}" class="ht-200 mb-0" alt="user">
                                <h2 class="mt-4 text-white tx-normal">Reset Your Password</h2>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Don't worry! We will help you to recover
                                    your password</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

@endsection

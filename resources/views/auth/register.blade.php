@php
      $captcha = strtoupper(substr(md5(rand()), 0, 6)); // Generate random text
@endphp

@extends('layouts.guest1')
@section('title', 'Sign up')
@section('content')





        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row row-sm">
                        <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 login_form rounded-start-11">
                            <div class="container-fluid">
                                <div class="row row-sm ">
                                    <div class="col-md-12 col-lg-12 px-lg-12 px-xl-12 d-flex flex-column py-6">
                                        @if (Session::has('status'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="text-center mt-4"  >
                                        <a href="/">
                                            <img src="{{ asset('storage/app/public/'.$settings->logo)}}" style="height: 60px" class="text-center" />
                                        </a>
                                    </div>
                                    <div class="card-body mt-2 mb-2">
                                        <h2 class="text-start mb-2">Sign Up for Free</h2>
                                        <p class="mb-4 text-muted tx-13 ms-0 text-start">It's Free to Sign up and only
                                            takes a minute.</p>

                                        <center>



                                        </center>

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label class="tx-medium">Full Name</label>
                                                            <input class="form-control" placeholder="Enter your Name" type="text"
                                                            name="name" required="" value="{{ old('name') }}">

                                                        </div> @error('name')
                                                        <small class="fs-6 text-danger">{{ $message }}</small>
                                                    @enderror

                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                            <label class="tx-medium">Username</label>
                                                            <input class="form-control" placeholder="Enter Preferred Username"
                                                                type="text" name="username"  value="{{ old('username') }}"required="">

                                                        </div>
                                                        @error('username')
                                                        <small class="fs-6 text-danger">{{ $message }}</small>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Email</label>
                                                <input class="form-control" placeholder="Enter your email" type="email"
                                                    autocomplete="username" name="email" value="{{ old('email') }}" required="">

                                            </div>
                                            @error('email')
                                            <small class="fs-6 text-danger">{{ $message }}</small>
                                        @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <div class="form-group text-start">
                                                    <label class="tx-medium">Phone</label>
                                                    <input class="form-control" placeholder="Enter your phone" type="text"
                                                        maxlength="13" name="phone" value="{{ old('phone') }}" required="">

                                                </div>
                                                @error('phone')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                                            </div>
                                        </div>



                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Gender</label>
                                                <select class="form-control select2-no-search" value="{{ old('gender') }}" name="gender"
                                                    required="">
                                                    <option label="Select Gender">
                                                    </option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                <span class="alert-danger" style="float:right;"></span>
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                            <label class="tx-medium">Country</label>
                                            <select class="form-control select2" name="country"  value="{{ old('country') }}"required="">
                                                @include('auth.countries')
                                            </select>

                                        </div>
                                    </div>


                                            </div>

                                        </div>

                                            <div class="form-group text-start">
                                                <div class="row"> <!-- Add row for horizontal alignment -->
                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                <label class="tx-medium">Password</label>
                                                <input class="form-control border-end-0"
                                                    placeholder="Enter your password" autocomplete="new-password"
                                                    type="password" data-bs-toggle="password" name="password"
                                                    required="">

                                                        </div>
                                                        @error('password')
                                                        <small class="fs-6 text-danger">{{ $message }}</small>
                                                    @enderror
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-4">
                                                    <label class="tx-medium">Confirm Password</label>
                                                    <input class="form-control border-end-0" placeholder="Confirm Password"
                                                        type="password"
                                                        data-bs-toggle="password"   name="password_confirmation" required="">

                                                    </div>

                                                </div>

                                                </div>

                                            </div>


                                            @if (Session::has('ref_by'))
                                            <div class="form-group text-start">
                                                <label class="tx-medium"> Referral ID</label>
                                                <input id="referrer" class="form-control"
                                                    placeholder="Referral Code (Optional)" type="text"  value="{{ session('ref_by') }}"
                                                    name="ref_by" required>
                                            </div>
                                            @endif


                                            <div class="form-group text-start">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text p-0 border-0">
                                                            <link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet"><div style="height: 46px; line-height: 46px; width:4%; text-align: center; background-color: #003; color: #e2a606; font-size: 18px; font-weight: bold; letter-spacing: 4px; font-family: 'Henny Penny', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;"><span style="    float:right;     -webkit-transform: rotate(356deg);">{{$captcha}}</span>        </div>

                                                        </span>
                                                    </div>
                                                    <input type="text" name="captcha" id="captcha" class="form-control font-weight-bold" placeholder="Enter Captcha" required>

                                                </div>

                                                @if ($errors->has('captcha'))
                                                <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                                @endif

                                         <input type='hidden' name='captcha_confirmation' value='{{$captcha}}'>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                <label class="tx-medium">Account Type</label>

                                                <select  class="form-control" name="account[]" data-live-search="true" tabindex="-1" aria-hidden="true" required multiple>
                                                    <option>Binary Option Trading</option>
                                                    <option>Forex Trading</option>
                                                    <option>Stock Trading</option>
                                                    <option>CryptoCurrency Investment</option>
                                                    <option>NFT Trading</option>
                                                  </select>
                                            </div>
                                        </div>


                                            <button type="submit" name="submit"
                                                class="btn btn-primary btn-block">Register</button>

                                        </form>
                                        <div class="text-start mt-4 ms-0 mb-3">
                                            <p class="mb-0">Already have an account? <a href="{{route('login')}}">Sign In</a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->


@endsection

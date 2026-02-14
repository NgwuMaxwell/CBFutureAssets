@extends('layouts.guest1')
@section('title', 'Reset your password')
@section('content')
         <div class="row signpages text-center">
            <div class="col-md-12">
                
                 <div class="row row-sm">
                        <div class="col-lg-8 col-xl-8 col-xs-8 col-sm-12 login_form rounded-start-11">

                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                       
                                     

                                            {{-- <div id="login_loader"
                                                style="padding: 3rem; margin: 0 1.5rem 2rem; display: none; align-items: center; justify-content: center; flex-direction: column;">
                                                <img src="{{ asset('temp/auth/main/assets/img/loader.svg')}}" alt="Loader">
                                                <span style="letter-spacing: 4px;" class>LOGGING...</span>
                                            </div> --}}

                <div class="card border-0">
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="text-center">
                <a href="/">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="Logo" class="w-50">
                </a>
            </div>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Reset Password
            </h1>

            <!-- Subtitle -->
            <p class="text-secondary text-center">
                Enter your email address and your new password to reset it.
            </p>

            <!-- Form -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Email Address
                            </label>
                            <!-- Input -->
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="Your email address">
                            @error('email')
                                <small class="fs-6 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Password
                            </label>

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password" name="password" required>

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                        @error('password')
                            <small class="fs-6 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-4">
                            <!-- Label -->
                            <label class="form-label">
                                Confirm password
                            </label>
                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password again" name="password_confirmation" required>

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <!-- Button -->
                        <button type="submit" class="btn w-100 btn-primary mt-6 mb-2">Reset password</button>
                    </div>
                </div> <!-- / .row -->
            </form>
        </div>
    </div> <!-- / .row -->
      </div> <!-- / .row -->
     </div>
         </div>
    </div> <!-- / .row -->
      </div> <!-- / .row -->
@endsection

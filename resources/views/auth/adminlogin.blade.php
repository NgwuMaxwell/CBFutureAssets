@extends('layouts.guest1')
@section('title', 'Login manager account')
@section('content')

    <div class="row signpages text-center">
            <div class="col-md-12">
                
                 <div class="row row-sm">
                        <div class="col-lg-8 col-xl-8 col-xs-8 col-sm-12 login_form rounded-start-11">

                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <div class="text-center">
                                            <a href="/">
                                                <img src="{{ asset('storage/app/public/'.$settings->logo)}}" style="height: 60px" class="text-center" />
                                            </a>
                                        </div>
                                     

                                            {{-- <div id="login_loader"
                                                style="padding: 3rem; margin: 0 1.5rem 2rem; display: none; align-items: center; justify-content: center; flex-direction: column;">
                                                <img src="{{ asset('temp/auth/main/assets/img/loader.svg')}}" alt="Loader">
                                                <span style="letter-spacing: 4px;" class>LOGGING...</span>
                                            </div> --}}

                <div class="card border-0">
            @if (session('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            </div>
            <!-- Title -->
            <h1 class="mb-2 text-center">
                Sign In
            </h1>

            <!-- Subtitle -->
            <p class="text-secondary text-center">
                Enter your email address and password to access your account.
            </p>

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                         <div class="form-group text-start">
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

                    <div class="col-12">
                        <!-- Password -->
                        <div class="mb-4">

                            <div class="row">
                                <div class="col">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>
                                </div>

                                <div class="col-auto">

                                    <!-- Help text -->
                                    <a href="{{ route('admin.forgetpassword') }}"
                                        class="form-text small text-muted link-primary">Forgot password</a>
                                </div>
                            </div> <!-- / .row -->

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input
                                    placeholder="Your password" name="password">

                                <button type="button" class="input-group-text px-4 text-secondary link-primary"
                                    data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->
                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <!-- Button -->
                        <button type="submit" class="btn w-100 btn-primary mt-6 mb-2">Sign in</button>
                    </div>
                </div> <!-- / .row -->
            </form>
        </div>
         </div>
    </div> <!-- / .row -->
     </div>
         </div>
    </div> <!-- / .row -->
      </div> <!-- / .row -->
@endsection
